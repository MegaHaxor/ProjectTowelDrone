#!/usr/bin/env python

## The is the main test program for the stepper motor.
## the goal of which is to take in a number as an argument
## Convert that into the number of turns, and produce that on the motor.

## Note: Comment Convention is to explain all points for
## future use in the final program.

## David Robinson
## Version 0.01


import time
import RPi.GPIO as GPIO

M1 = 9
M2 = 11
M3 = 0
M4 = 5

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

# Sets up the pins
GPIO.setup(M1, GPIO.OUT)
GPIO.setup(M2, GPIO.OUT)
GPIO.setup(M3, GPIO.OUT)
GPIO.setup(M4, GPIO.OUT)

# turns the stepper int the counterclockwise direction
def counterClock(turns):

    for number in range(0, turns*500): # 500 is one full rotation
    # The follwing is one step
        motorMove(1,0,0,0)
        motorMove(1,1,0,0)
        motorMove(0,1,0,0)
        motorMove(0,1,1,0)
        motorMove(0,0,1,0)
        motorMove(0,0,1,1)
        motorMove(0,0,0,1)
        motorMove(1,0,0,1)
# turns the stepper in the clockwise direction
def clock(turns):
    for number in range(0, turns*500): # 500 is one full rotation
    # The follwing is one step
        motorMove(1,0,0,0)
        motorMove(1,0,0,1)
        motorMove(0,0,0,1)
        motorMove(0,0,1,1)
        motorMove(0,0,1,0)
        motorMove(0,1,1,0)
        motorMove(0,1,0,0)
        motorMove(1,1,0,0)
# The follwing configures the pins to high and low for their
# respective stepping
def motorMove(a, b, c, d):
    if(a == 1):
        GPIO.output(M1, GPIO.HIGH)
    else:
        GPIO.output(M1, GPIO.LOW)
    if(b == 1):
        GPIO.output(M2, GPIO.HIGH)
    else:
        GPIO.output(M2, GPIO.LOW)
    if(c == 1):
        GPIO.output(M3, GPIO.HIGH)
    else:
        GPIO.output(M3, GPIO.LOW)
    if(d == 1):
        GPIO.output(M4, GPIO.HIGH)
    else:
        GPIO.output(M4, GPIO.LOW)
    time.sleep(0.005) # fastest possible movement

def main():
    clock(1) # one full turn clockwise
    counterClock(1) # one full turn counterclockwise



main()
