import datetime

for i in range(1,20):
    datebuff = datetime.datetime.now() - datetime.timedelta(hours=i)
    print(datebuff)