# Authentication

# How to use

Upload the files into your WebServer of choice & open the sql.sql and run it in phpmyadmin or what ever you use for mysql
Put the login for your database into the functions.php in the assets folder
For Login you need a session ID and here is the code in c# to get the session ID

```
        public static String sha256_hash(String value)
        {
            StringBuilder Sb = new StringBuilder();

            using (SHA256 hash = SHA256Managed.Create())
            {
                Encoding enc = Encoding.UTF8;
                Byte[] result = hash.ComputeHash(enc.GetBytes(value));

                foreach (Byte b in result)
                    Sb.Append(b.ToString("x2"));
            }

            return Sb.ToString();
        }
        public static string ID()
        {
            return $"{sha256_hash(DateTime.UtcNow.ToString("yyyy/MM/dd HH:mm") + Program.key)}";
        }
```

Figure rest out im not holding your hand



# Why

Im bored + free decent self hosted authentication with session validation
