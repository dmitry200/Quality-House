<!DOCTYPE html>
<html>
	<head>
		<title>Панель администратора</title>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
    <header class="container">
      
    </header>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
             <fieldset>
               <legend>Жилые комплексы</legend>
                <table class="table table-bordered">
                 <tr>
                   <td>№</td>
                   <td>Название</td>
                   <td>Застройщик</td>
                   <td>Адрес</td>
                   <td>Статус</td>
                 </tr>
               </table>
             </fieldset>
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Застройщики</legend>
                <table class="table table-bordered">
                  <tr>
                    <td>№</td>
                    <td>Название</td>
                  </tr>
                </table>
              </fieldset>
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Районы</legend>
                <table class="table table-bordered">
                  <tr>
                    <td>№</td>
                    <td>Название</td>
                  </tr>
                </table>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-12">
              <fieldset>
                <legend>Добавить застройщика</legend>
                <form name="addBuilderForm" method="POST">
                  <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="builder" class="form-control">
                  </div>
                  
                </form>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer>
      
    </footer>
	</body>
</html>
