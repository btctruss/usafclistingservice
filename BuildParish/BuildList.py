# Read in date 
import sys
import os
import requests
import string
import re
import shutil

from bs4 import BeautifulSoup
from lxml import html

def ScrapeForeHtml(state):

	URLforeclosure = 'http://stjohnsheriff.org/sheriff_sale.php'

	# Read data from URLforeclosure
	r = requests.get(URLforeclosure)

	soup = BeautifulSoup(r.text, 'lxml')

	i = 0
	location = {}
	for table_row in soup.select(".saleitems"):
		table_cells = table_row.findAll('td')
		if len(table_cells) > 0:
			line = str(table_cells) + "\n"
			strLine	= line.split("</td>")

			saledate = strLine[7].split('strong>')
			saledate = saledate[1].split('<', 1)[0]

			print(i,': ',saledate)

		i = i + 1
	return i


def main(argv):

	sum   = 0
	state = 'LA'

	sum = ScrapeForeHtml(state)

	print ('The total number of records found in : ', sum)


# Initiate main program
if __name__ == "__main__":
    main(sys.argv)

