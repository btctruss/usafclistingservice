# Read in date 
import sys
import os
import requests
import string
import re
import shutil

# Convert month to number
def month_number(string):
	m = {'jan': 1,'feb': 2,'mar': 3,'apr':4,'may':5,'jun':6,
		 'jul':7,'aug':8,'sep':9,'oct':10,'nov':11,'dec':12
		 }
	s = string.strip()[:3].lower()

	try:
		out = m[s]
		return out
	except:
		raise ValueError('Not a month')


from bs4 import BeautifulSoup
from lxml import html

def ScrapeForeHtml(state):
	# Build csv file foreclosure mailer
	filename = './output.csv'
	outfile = open(filename, 'a+')


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
			saledate =re.sub(r'\W+', ',', saledate)
			saledatelist = saledate.split(',')
			saledate = str(month_number(saledatelist[0])) + '/' + str(saledatelist[1]) + '/' + str(saledatelist[2])

			print(i,':',saledate)
			outfile.write(saledate + '\n')

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

