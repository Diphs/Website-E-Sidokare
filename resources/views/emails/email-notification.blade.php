<!DOCTYPE html>
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <style>

      body{
        background: #E5E5E5 !important ; 
        font-family: 'Work Sans', sans-serif;
      }
      .button{
        background: #1877F2; 
        color: #fff !important ; 
        border-radius: 3px; 
        display: block;
        text-decoration: none;
        padding: 15px;
        font-size: 16px; 
        text-align: center;
        margin-top: 60px;
      }
      .main-container{
        max-width: 29.375em;  
        width: 100%; 
        border-radius: 10px; 
        background: #ffffff;
        margin: 0 auto;
        border: #fff; 
      }

      .content{
        width: 80%;
        min-width: 23.9375em; 
        margin: 2em auto;
        font-size: 12px;
      }

      .link{
        color: #000; text-decoration: none;text-align: center;margin-bottom: 10px;
      }

      .title-text{
        font-weight: 600;
      }

      .header{
        font-size: 16px;
        font-weight: 600; 
        padding-bottom: .5em; 
        letter-spacing: -0.08em;
      }

      .welcome-message{
        font-size: 1em;
        padding-bottom: 1rem;
        letter-spacing: .5rem;
      }

      .img-container{
        padding: 0 3em;
        width: 100%;
        min-width: 23.9375em;
        height: 108px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px; 
        background-color: #1877F2
      }

      .footer-link{
        text-align: center; 
        padding-top: 2em; 
        padding-bottom: .8em;
      }

      .icons{
        width: 60%; 
        margin: 0 auto
      }
  table{
  border-collapse: collapse !important;
  border: none;

}
      .table-width{
        width: 100%;
      }

      .text{
        font-weight: 500; 
        padding-top:1em ; 
        padding-bottom: .5em;
      }

    </style>
  </head>
    <body>
  
        <table class="main-container">
         <tr colspan="5">
          <td>
            <table class="table-width">
              <tr>
                <td colspan="5" class="img-container ">
                    <img src="https://i.imgur.com/6GdbHPj.png"> 
                </td>
              </tr>
    
            </table>
          </td>
         </tr>
        <tr><td>
          <table class="content">
            <tr><td colspan="5" class="welcome-message">SELAMAT DATANG</td></tr>
            <tr><td colspan="5" class="header">Email Pengirim : {{ $email }}</td></tr>
            <tr><td colspan="5" class="header">Nama Pengirim : {{ $nama }}</td></tr>
            <tr>
                
                <td colspan="2">Isi Pesan : {{ $isi }}</td>
            </tr>
              <tr>
                <td colspan="5">
                  <table class="table-width">
                    <tr>
                  </tr>
                
                    <tr><td class="footer-link">
                      <a href="#" class="link">Desasidokare</a>
      
                    </td></tr>
                 
      
                <tr>
                  <td>
                    <table class="icons">
                      <tr colspan ="5">
                        <td>
                          <a href="#">
                          <img src="https://res.cloudinary.com/marykaystuff/image/upload/v1660814472/media/user_profile/grikcgydpd48hjyrkebs.png">
                          </a>
                        </td>
                        <td>
                          <a href="#">
                          <img src="https://res.cloudinary.com/marykaystuff/image/upload/v1660814556/media/user_profile/bnbzay57s71dtfa3nx6k.png" >
                          </a>
                        </td>
                        <td>
                          <a href="#">
                          <img src="https://res.cloudinary.com/marykaystuff/image/upload/v1660814490/media/user_profile/ohcadm3gcmpelhl5qaid.png" >
                          </a>
                        </td>
                        <td>
                          <a href="#">
                          <img src="https://res.cloudinary.com/marykaystuff/image/upload/v1660814490/media/user_profile/ftusawk21cfahxyy0ji5.png" >
                        </a>
                        </td>
          
                            
                      </tr>
                    </table>
                  </td>
                </tr>
      
                  </table>
                </td>
              </tr>

          </table>
        </td></tr>

          </table>
      
   </body>
</html>