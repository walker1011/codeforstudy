from urllib import urlopen
import re

p = re.compile('<a.*? href="(.*?)" .*?>(.*?)</a>')
text = urlopen('http://python.org/community/jobs').read()

for url,name in p.findall(text):
    print '%s (%s)' % (name,url)

#print text
