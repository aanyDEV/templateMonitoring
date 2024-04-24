import mysql.connector
import time
import random
from datetime import datetime, timedelta

def sisakan(cursor, tbName, keepCount):
    cursor.execute(f"SELECT COUNT(*) FROM {tbName}")
    totCount = cursor.fetchone()[0]
    if totCount > keepCount:
        delCount = totCount - keepCount
        cursor.execute(f"DELETE FROM {tbName} ORDER BY id LIMIT {delCount}")

def genTGLWAKTU(start):
    current_date = start
    current_time = timedelta(hours=0, minutes=0, seconds=0)
    while True:
        yield current_date.strftime("%Y-%m-%d"), (datetime(1, 1, 1) + current_time).strftime("%H:%M:%S")
        current_date += timedelta(days=1)
        current_time += timedelta(seconds=1)
        
def genDATARANDOM(tglwaktuGEN):
    date, time = next(tglwaktuGEN)
    sensor = [random.randint(1, 100) for _ in range(6)]
    return date, time, sensor

def keMYSQL(data):
    try:
        mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="webiot1"
        )

        mycursor = mydb.cursor()
        sisakan(mycursor, 'data', 10)
        sql = "INSERT INTO data (tanggal, waktu, pressure1, pressure2, pressure3, temp1, temp2, temp3) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
        tanggal, waktu, randomValue = data
        val = (tanggal, waktu, *randomValue)
        mycursor.execute(sql, val)
        mydb.commit()
        print(mycursor.rowcount, "record berhasil diinputkan")

    except mysql.connector.Error as err:
        print("Error:", err)

if __name__ == "__main__":
    start = datetime(2023, 4, 1)
    tglwaktuGEN = genTGLWAKTU(start)
    while True:
        data = genDATARANDOM(tglwaktuGEN)
        keMYSQL(data)
        time.sleep(1)