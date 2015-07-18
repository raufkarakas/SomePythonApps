__author__ = 'rkarakas'

import time
import subprocess
import json
import gspread
import feedparser
from oauth2client.client import SignedJwtAssertionCredentials

# Google Account
spreadsheet = 'Monitor'

# For more information: https://developers.google.com/api-client-library/python/guide/aaa_overview

def getData():
    # Room Temperature
    output1 = subprocess.check_output(["/home/pi/Adafruit_Python_DHT/examples/AdafruitDHT.py", "2302", "12"])
    temp1 = output1[(output1.index("p=") + 2):(output1.index("*C"))]
    hum1 = output1[(output1.index("y=") + 2):(output1.index("%"))]
    print("Room Temperature: T: %s, H: %s" %(temp1, hum1))
    # Outside Temperature
    output2 = subprocess.check_output(["/home/pi/Adafruit_Python_DHT/examples/AdafruitDHT.py", "2302", "5"])
    temp2 = output2[(output2.index("p=") + 2):(output2.index("*C"))]
    hum2 = output2[(output2.index("y=") + 2):(output2.index("%"))]
    print("Outside Temperature: T: %s, H: %s" %(temp2, hum2))
    # IP address
    tempData = feedparser.parse("http://my-ip.mobi")["feed"]["summary"]
    startPoint, endPoint = tempData.index(": "), tempData.index(" </h2>")
    ip = tempData[(startPoint+4):endPoint]
    print("IP address: %s" %(ip))

    values = [time.ctime(), temp1, hum1, temp2, hum2, ip]
    return values

def appendData():
    try:
        json_key = json.load(open('/home/pi/pythonApps/raspi-monitor.json'))
        scope = ['https://spreadsheets.google.com/feeds']
        credentials = SignedJwtAssertionCredentials(json_key['client_email'], json_key['private_key'], scope)
        gc = gspread.authorize(credentials)
        worksheet = gc.open(spreadsheet).sheet1
        worksheet.append_row(getData())
    except:
        print("Error occured. Will try again in 10 seconds.")
        time.sleep(10)
        appendData()

while(True):
    appendData()
    time.sleep(3600)
