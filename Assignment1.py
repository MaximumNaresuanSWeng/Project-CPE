# -*- coding: utf-8 -*-
import time
import datetime
listthai = [r'๐',r'๑',r'๒',r'๓',r'๔', r'๕',r'๖',r'๗',r'๘',r'๙']
timestamp = int(time.time())
print 'Unix timestamp: ' , timestamp
#-------------Step  1------------------
# Unix timestamp convert date
temp1 = datetime.datetime.fromtimestamp(timestamp).strftime('%d-%m-%Y %H:%M:%S')
temp2 = datetime.datetime.fromtimestamp(timestamp).strftime('%A %d %B %Y %H:%M:%S')
#print 'Date and Time: ',temp1
#print 'Unix timestamp convert Date full: ',temp2
#-------------Step  2 Thaidate------------------#
def thaidate(timestamp):
  temp3 = datetime.datetime.fromtimestamp(timestamp).strftime('%A %d %B %Y')
  word = temp3.split(' ')   
  #convert day eng to thai
  convertday(word)
  #convert month eng to thai 
  convertmonth(word)
  #convert at day eng to tahi
  convertnumberday(word)
  #convert BCE eng to tahi
  convertnumberyear(word)
  accept = r'%s %s %s %s' % (word[0],word[1],word[2],word[3]) 
  return accept
#-------------Step  3 Thaidatetime------------------#
def thaidatetime(timestamp):
  temp4 = datetime.datetime.fromtimestamp(timestamp).strftime('%A %d %B %Y %H:%M:%S')
  word = temp4.split(' ')   
  #convert day eng to thai     
  convertday(word)
  #convert month eng to thai 
  convertmonth(word)
  #convert at day eng to tahi
  convertnumberday(word)
  #convert year eng to tahi
  convertnumberyear(word)
  #convert Time eng to tahi 
  ct = word[4].split(':')
  t0 = ct[0]
  timehr = ''
  for c in t0:
    timehr += listthai[int(c)]
  ct[0] = timehr
  #_________________________
  t1 = ct[1]
  timem = ''
  for c in t1:
    timem += listthai[int(c)]
  ct[1] = timem
  #_________________________
  t2 = ct[2]
  times = ''
  for c in t2:
    times += listthai[int(c)]
  ct[2] = times
  timeans = 'เวลา '+ ct[0]+':'+ct[1]+':'+ct[2] + ' น.'
  accept = r'%s %s %s %s %s' % (word[0],word[1],word[2],word[3],timeans) 
  return accept
#--------------------------convert day-------------------------------#
def convertday(word): 
  #convert day eng to thai
  day = word[0]
  thai_day_dic = {'Monday': r'วันจันทร์','Tuesday': r'วันอังคาร','Wednesday': r'วันพุธ','Thursday': r'วันพฤหัสบดี','Friday': r'วันศุกร์','Saturday': r'วันเสาร์','Sunday': r'วันอาทิตย์'}
  word[0] = thai_day_dic[day]
  return word[0]
#-----------------------convert month-----------------------------#
def convertmonth(word):
#convert month eng to thai
  month = word[2]
  thai_month_dic = {'January': r'มกราคม','February': r'กุมภาพันธ์','March': r'มีนาคม','April': r'เมษายน','May': r'พฤษภาคม','June': r'มิถุนายน','July': r'กรกฎาคม','August': r'สิงหาคม','September': r'กันยายน','October': r'ตุลาคม','November': r'พฤศจิกายน','December':r'ธันวาคม'} 
  word[2] = thai_month_dic[month]
  return word[2]
#----------------------convert day-----------------------------#
def convertnumberday(word):
  #convert at day eng to tahi
  h = word[1]  
  wout = ''
  for c in h:
    wout += listthai[int(c)]
  word[1] = wout  
  return word[1]
#---------------------convert year-----------------------------#
def convertnumberyear(word):
  word[3] = int(word[3])  + 543
  cw = str(word[3])
  wout1 = ''
  for c in cw:
    wout1 += listthai[int(c)]
  word[3] = wout1
  return word[3]
#-----------------------Use  function-----------------------------#
print thaidate(timestamp)
print thaidatetime(timestamp)

