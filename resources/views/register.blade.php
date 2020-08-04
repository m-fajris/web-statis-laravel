<!DOCTYPE html>
<html>
    <head>
        <title> SanberBook </title>
        <meta charset="UTF-8">
    </head>

    <body>
    
        <!-- bagian awal, isinya  heading -->
        <div>
            <h1> Buat Account Baru! </h1>
            <h2> Sign Up Form </h2>
        </div>

        
        <form action="/welcome" method="POST">
                @csrf
                <label for="nama_depan">First Name:</label> <br><br>
                <input type="text" name="nama_depan"> 
                <br><br>
                <label for="nama_belakang">Last Name:</label> <br><br>
                <input type="text" name="nama_belakang"> 
                <br><br>

                <label>Gender:</label> <br><br>
                <input type="radio" name="gender" value="0">Male <br>
                <input type="radio" name="gender" value="1">Female <br>
                <input type="radio" name="gender" value="2">Other
                <br>

                <label>Nationality:</label> <br><br>
                    <select>
                        <option value="id">Indonesia</option>
                        <option value="us">America</option>
                    </select>
                <br><br>

                <label>Language Spoken:</label> <br><br>
                <input type="checkbox" name="language" value="0"> Bahasa Indonesia<br>
                <input type="checkbox" name="language" value="1"> English<br>
                <input type="checkbox" name="language" value="2"> Other<br>
                <br>

                <label for=bio_user>Bio:</label> <br><br>
                <textarea cols="50" rows="10" id="bio_user"></textarea>
                <br>

                <br>
                <input type="submit" value="Sign Up">
            
        </form>

    </body>
</html>