#!/usr/bin/env python

## This is an experimental program to test the on off
## and I2C functionality
## of the Sensor units by Atlas Scientific. This program is written in python
## Comment Convention is as such to explain all important steps for future implimentation
## David Robinson
## Version 0.9


import io
import sys
import fcntl
import copy
import string
import time
import smbus
import RPi.GPIO as GPIO
from AtlasI2C import (
	 AtlasI2C
)

# On off Pin delegation.
TEMP_PIN = 4
ORP_PIN = 17
PH_PIN = 27
DO_PIN = 22
CONDUCT_PIN = 10


GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

GPIO.setup(TEMP_PIN, GPIO.OUT)
GPIO.setup(ORP_PIN, GPIO.OUT)
GPIO.setup(PH_PIN, GPIO.OUT)
GPIO.setup(DO_PIN, GPIO.OUT)
GPIO.setup(CONDUCT_PIN, GPIO.OUT)

def on():
	GPIO.output(TEMP_PIN, GPIO.HIGH)
	GPIO.output(ORP_PIN, GPIO.HIGH)
	GPIO.output(PH_PIN, GPIO.HIGH)
	GPIO.output(DO_PIN, GPIO.HIGH)
	GPIO.output(CONDUCT_PIN, GPIO.HIGH)
	time.sleep(2)

def off():
    GPIO.output(TEMP_PIN, GPIO.LOW)
    GPIO.output(ORP_PIN, GPIO.LOW)
    GPIO.output(PH_PIN, GPIO.LOW)
    GPIO.output(DO_PIN, GPIO.LOW)
    GPIO.output(CONDUCT_PIN, GPIO.LOW)

# The follwing function was pulled from the I2C test program provided by Atlas Scientific
def get_devices():
    device = AtlasI2C()
    device_address_list = device.list_i2c_devices()
    device_list = []

    for i in device_address_list:
        device.set_i2c_address(i)
        response = device.query("I")
        try:
            moduletype = response.split(",")[1]
            response = device.query("name,?").split(",")[1]
        except IndexError:
            print(">> WARNING: device at I2C address " + str(i) + " has not been identified as an EZO device, and will not be queried")
            continue
        device_list.append(AtlasI2C(address = i, moduletype = moduletype, name = response))
    return device_list

def main():


	on() # Gives power to the sensors
	device_list = get_devices() # Gets device List

	# This puts all now powered sensors to sleep
	for number in range(0,5):
		device = device_list[number]
		device.query("sleep")


	# The name list, for printing purposes
	devices = ["Temp", "ORP", "pH", "DO", "Conduction"]

	# The following take one reading from each sensor
	for number in range(0,5):
		device = device_list[number] # Changes device number
		valueString = str(device.query('R')) # Gets string of information
		device.query("sleep") # Sends device back to sleep
		value = valueString.split(":", 1) # Splits off value we care about
		final = value[1] # Formats value we care about
		print(devices[number] + " -----" + final) # Prints out the value
		time.sleep(0.33) # Takes a break

	off() # turns all sensors off again


if __name__ == '__main__':
	main()
