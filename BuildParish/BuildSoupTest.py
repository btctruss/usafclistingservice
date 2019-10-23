# Read in date 
import sys
import os
import requests
import string

from bs4 import BeautifulSoup
from lxml import html

def ScrapeForeHtml():

    # Add new URL for testing available Foreclosure sites
	URLforeclosure = 'http://stjohnsheriff.org/sheriff_sale.php'

	# Read data from URLforeclosure
	r = requests.get(URLforeclosure)

	soup = BeautifulSoup(r.text, 'lxml')

	print (soup)
	i = 1

	return i

def main(argv):

	sum = ScrapeForeHtml()

# Initiate main program
if __name__ == "__main__":
    main(sys.argv)

