import signal
# Define signal handler function
def myHandler(signum, frame):
    print("Now, it's the time")

# register signal.SIGALRM's handler 
signal.signal(signal.SIGALRM, myHandler)
signal.alarm(1)
while True:
    print('not yet')