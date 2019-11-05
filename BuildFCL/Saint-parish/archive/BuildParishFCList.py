# Read in date
import sys
import os
import re
import shutil

def title_except(s, exceptions):
   word_list = re.split(' ', s)       #re.split behaves as expected
   final = [word_list[0].capitalize()]
   for word in word_list[1:]:
      final.append(word in exceptions and word or word.capitalize())
   return " ".join(final)
 
def FindFCRecords(state):

	inputfile = 'data/input.txt'
	
	# Build FC list	
	outputfile =  './build/output.csv'
	outfile = open(outputfile,'w')
	
	with open(inputfile, "r") as infile:
		data = infile.read()  # Read the contents of the file into memory.
	my_list = data.splitlines()

	# Build foreclose list 
	i=0
	count=1
	list = []
	Value1 = ""
	for line in my_list:
		if count == 1:
			value1 = line.replace('\n','')	

		if "#" in line:
			i = i + 1 
			recordlist = line.split('|')
			bankowner = recordlist[1].split('vs.')
			print (i,": Bank: ", bankowner[0])
			print (i,": owner: ", bankowner[1])
			print (i,"Bank owner",bankowner)
		if "Status" in line:		
			count = 0
		count = count + 1
				
	infile.close()
	outfile.close()
	
	return i
	
def main(argv):

	sum   = 0		
	state 	 = sys.argv[1]

	directory = './build' 
	if not os.path.exists(directory):
		os.makedirs(directory)		

	filename = './build/output.csv'
	# Remove old build file
	if os.path.exists(filename):
		os.remove(filename)
	
	sum  = FindFCRecords(state)	

	
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)