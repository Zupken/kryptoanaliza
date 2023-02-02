import os
from time import sleep
os.system('hashcat -m 0 -a 0 hash.txt rockyou.txt -o output.txt')