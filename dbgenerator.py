import mysql.connector

def cekDB(cursor, database_name):
    cursor.execute("SHOW DATABASES")
    databases = cursor.fetchall()
    for db in databases:
        if db[0] == database_name:
            return True
    return False

def buatDB(cursor, database_name):
    cursor.execute("CREATE DATABASE IF NOT EXISTS {}".format(database_name))
    print("Database {} berhasil dibuat.".format(database_name))

def buatTB(cursor):
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS `data` (
      `id` int(5) NOT NULL AUTO_INCREMENT,
      `tanggal` date NOT NULL,
      `waktu` time NOT NULL,
      `pressure1` int(3) NOT NULL,
      `pressure2` int(3) NOT NULL,
      `pressure3` int(3) NOT NULL,
      `temp1` int(3) NOT NULL,
      `temp2` int(3) NOT NULL,
      `temp3` int(3) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    """)
    print("Tabel 'data' berhasil dibuat.")

def tmbhDT(cursor):
    cursor.execute("""
    INSERT INTO `data` (`id`, `tanggal`, `waktu`, `pressure1`, `pressure2`, `pressure3`, `temp1`, `temp2`, `temp3`) VALUES
    (1, '2023-04-18', '00:00:17', 44, 16, 38, 65, 41, 47);
    """)
    print("Data berhasil dimasukkan ke dalam tabel.")

if __name__ == "__main__":
    mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        password=""
    )
    
    cursor = mydb.cursor()
    database_name = "webiot1"

    if cekDB(cursor, database_name):
        print("Database {} sudah tersedia.".format(database_name))
    else:
        buatDB(cursor, database_name)
        cursor.execute("USE {}".format(database_name))
        buatTB(cursor)
        tmbhDT(cursor)
        
    mydb.commit()
    cursor.close()
    mydb.close()