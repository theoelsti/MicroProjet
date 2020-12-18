import datetime

for i in range(0,20):
    datebuff = datetime.datetime.now() - datetime.timedelta(hours=i)
    print(datebuff)