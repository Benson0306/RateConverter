import pandas 
from sqlalchemy import create_engine
from datetime import datetime

dfs=pandas.read_html("http://rate.bot.com.tw/xrt?Lang=zh-TW")
currency=dfs[0]
currency=currency.iloc[:,[0,2]]
currency.columns=[ u'幣別',u'現金本行賣出']
currency[u'中文幣別']=currency[u'幣別'].str.replace(r'[A-Z]+',"")
currency[u'幣別']=currency[u'幣別'].str.extract('\((\w+)\)')
currency[u'抓取時間']=datetime.now().strftime('%m/%d %H:%M:%S')
engine = create_engine('mysql+mysqldb://root:E125170035@localhost:3306/rate?charset=utf8') 
con=engine.connect()
currency.to_sql(name='rate',con=con,if_exists='replace',index=False) 
