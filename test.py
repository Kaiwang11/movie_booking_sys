  
import pymysql
 
# 打开数据库连接
db = pymysql.connect(host='localhost',
                     user='root',
                     password='22826220',
                     database='IMDB')
cursor = db.cursor()
cursor.execute("SELECT VERSION()")
data = cursor.fetchone()
print ("Database version : %s " % data)
db.close()