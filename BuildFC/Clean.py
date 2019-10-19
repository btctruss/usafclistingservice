# Build Georgia listing

import sys
import os
import shutil

from os import listdir
from os.path import isfile, join

def main(argv):

	try:
		from configparser import ConfigParser

	except ImportError:
		from ConfigParser import ConfigParser  # ver. < 3.0

	# instantiate add the month 
	config = ConfigParser()

	# parse existing file
	config.read('Config.ini')	
	
	# Read paths from a section

	V_Month = config.get('FC_LISTING', 'Month') 		
	# Remove files

	mypath = './Final-Build/' + V_Month 
	if not os.path.exists(mypath):
		os.makedirs(mypath)	
			
	onlyfiles = [f for f in listdir(mypath) if isfile(join(mypath, f))]

	print 'Removing previous build files'
	
	for fname in onlyfiles:
		filename = './Final-Build/' + V_Month + '/' + fname
		print filename
		os.remove(filename)
		
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)
