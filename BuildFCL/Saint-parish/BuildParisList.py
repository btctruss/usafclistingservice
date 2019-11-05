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

def title_except(s, exceptions):
   word_list = re.split(' ', s)       #re.split behaves as expected
   final = [word_list[0].capitalize()]
   for word in word_list[1:]:
      final.append(word in exceptions and word or word.capitalize())
   return " ".join(final)

###########################################################
# I would like to turn theses functio int callable modules
###########################################################
def TruncBankStr(strValue):
	# Remove all charaters after give char
	truncStr = strValue.split(',', 1)[0]
	truncStr = truncStr.split('TRUST', 1)[0]
	truncStr = truncStr.split('D/B/A', 1)[0]
	truncStr = truncStr.split('F/B/A', 1)[0]

	return truncStr

def TruncOwnerStr(strValue):
	# Remove all charaters after give char
	truncStr = strValue.split('</strong>', 1)[0]
	truncStr = truncStr.split('A/K/A', 1)[0]
	truncStr = truncStr.split(',', 1)[0]

	return truncStr

## This function beforms the scraping and build the csv file
###########################################################
def ScrapeForeHtml(state):

	# Build csv file foreclosure mailer
	filename = './build/output.csv'
	outfile = open(filename, 'w')

	# Read data from URLforeclosure
	URLforeclosure = 'http://stjohnsheriff.org/sheriff_sale.php'
	r = requests.get(URLforeclosure)

	soup = BeautifulSoup(r.text, 'lxml')

	# print soup
	i = 0

	StrRecord = 'Status,Saledate,address,Homwowner,bank'
	outfile.write(StrRecord)

	for table_row in soup.select(".saleitems"):
		table_cells = table_row.findAll('td')
		if len(table_cells) > 0:
			line = str(table_cells) + "\n"
			strLine	= line.split("</td>")
			strLlst = strLine[1].split('<strong>')
		# Retrieve bank's name
			bank = strLlst[1].split('vs.',1)[0]
			bank = TruncBankStr(bank)
		# Retrieve homeowner's name
			owner = strLlst[1].split('vs.',1)[1]
			owner = TruncOwnerStr(owner)
			# Retrieve Address
			address = strLine[6].split('<td valign="top">', 1)[1]
			address = address.split('<br/>')
			address = address[0].rstrip()

			# Call function Retrieve Saledate

			saledate = strLine[7].split('strong>')
			saledate = saledate[1].split('<', 1)[0]
			saledate =re.sub(r'\W+', ',', saledate)
			saledatelist = saledate.split(',')
			saledate = str(month_number(saledatelist[0])) + '/' + str(saledatelist[1]) + '/' + str(saledatelist[2])

			# Retrieve Satatus
			Status = strLine[7].split('<strong>')
			Status = Status[2].split('<', 1)[0]

		# Output to cvsth file to build mailer
			StrRecord = Status + ',' +  saledate + ',' + address + ',' + owner + ',' + bank
			print(i,':', StrRecord)
			# Add client record to file
			outfile.write(StrRecord)

			i = i + 1

	return i

def main(argv):

	sum   = 0
	state 	 = 'LA' # sys.argv[1]

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

