# Read in date
import sys
import os
import requests
import string
import re
import shutil
import CountyLookup

from bs4 import BeautifulSoup
from lxml import html

def title_except(s, exceptions):
   word_list = re.split(' ', s)       #re.split behaves as expected
   final = [word_list[0].capitalize()]
   for word in word_list[1:]:
      final.append(word in exceptions and word or word.capitalize())
   return " ".join(final)
 
def ScrapeForeHtml(state):

	inputfile = 'data/input.txt'
	
	# Build FC list	
	outputfile =  './build/output.csv'
	outfile = open(outputfile,'w')
	
	with open(inputfile, "r") as infile:
		data = infile.read()  # Read the contents of the file into memory.
	my_list = data.splitlines()

	def ScrapeForeHtml(state):
		URLforeclosure = 'http://stjohnsheriff.org/sheriff_sale.php'

		# Read data from URLforeclosure
		r = requests.get(URLforeclosure)

		soup = BeautifulSoup(r.text, 'lxml')

		# print soup
		x = 0
		i = 0
		location = {}
		for table_row in soup.select(".saleitems"):
			line = repr(table_row)
			lineArray = line.split('>')
			street = lineArray[4].split('</span')
			print(i, 'Street: ', street)
			i = i + 1

		return i


def main(argv):

	sum   = 0		
	state 	 = sys.argv[1]

	directory = './build' 
	if not os.path.exists(directory):
		os.makedirs(directory)		

	filename = './build/output.csv'
	# Remove old build file

	print('1 - StaintParish ')
	print('Processing Staint Parish records... it will take a few minutes ')

	sum = ScrapeForeHtml(state)

	print
	'The total number of records found in : ', sum


# Initiate main program
if __name__ == "__main__":
    main(sys.argv)

