# Build Georgia listing

import sys
import os
import shutil

def main(argv):

	# Clean build
	#RunScript = 'python Clean.py '  
	# print RunScript
	#os.system(RunScript)

	# - Parish build list of read folders with parish to run 
	# For loop to get all folders under BuildParish
	os.chdir(V_SriptPathAuction)
	RunScript = 'python AuctionFCList.py ' +  V_State + ' ' + V_Month + ' ' + V_Saledate1
	#print RunScript
	os.system(RunScript)
	os.chdir( '../' )
	

	# Compile final FC list
	#RunScript = 'python CompileList.py ' + V_Month + ' ' + V_Day 
	#os.system(RunScript)
			
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)
