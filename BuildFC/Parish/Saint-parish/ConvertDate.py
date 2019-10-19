# Read in date 
import sys
import os

def LookupMonth(saledate,year):
	Saledate  = ""
	dateArray = saledate.split(',')
	newdate   = dateArray[0].split(':')	
	monthday  = newdate[1].lstrip()
	mmdd = monthday.split(' ')
	day = mmdd[1]

	if 'Jun' in mmdd:
		Saledate = '6/' + day + '/' + year
	elif 'Jul' in mmdd :
		Saledate = '7/' + day + '/' + year
	elif 'Aug' in mmdd :
		Saledate = '8/' + day + '/' + year
	elif 'Sep' in mmdd :
		Saledate = '9/' + day + '/' + year
	elif 'Oct' in mmdd :
		Saledate = '10/' + day + '/' + year
	elif 'Nov' in mmdd :
		Saledate = '11/' + day + '/' + year
	elif 'Dec' in mmdd :
		Saledate = '12/' + day + '/' + year
	elif 'Feb' in mmdd :
		Saledate = '2/' + day + '/' + year
	elif 'Mar' in mmdd :
		Saledate = '3/' + day + '/' + year
	elif 'Apr' in mmdd :
		Saledate = '4/' + day + '/' + year
	elif 'May' in mmdd :
		Saledate = '5/' + day + '/' + year

	# print Saledate 
		
	return Saledate
