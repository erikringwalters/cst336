<?php
    include 'inc/header.php';
    
     function getPetList() {
            include '../../dbConnection.php';
            $conn = getDatabaseConnection();


            $sql = "SELECT *
                    FROM adoptees"; 
                    
                            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
 
            return $record;
        }
?>
  
<script>

    $(document).ready( function(){
        
        $(".petLink").click( function(){
            
            //alert($(this).attr('id'));
            $('#petInfoModal').modal("show");
            $("#petInfo").html("<img src='img/loading.gif'>");
            
            $.ajax({

                type: "GET",
                url: "api/getPetInfo.php",
                dataType: "json",
                data: { "id": $(this).attr('id')},
                success: function(data,status) {
                
                   //alert(data);
                   $("#petInfo").html(" Age: " + data.age + "<br>" +
                                      " <img src='img/" + data.pictureURL + "'><br >" + 
                                       data.description);   
                 
                   $("#petNameModalLabel").html(data.name);                   
                   
                
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
            
             
            
            
        }); //.getLink click
        
    });//document.ready

    
</script>            

<?php
    
        $pets = getPetList();
        //print_r($pets);
        
        foreach ($pets as $pet){
            
            echo "Name: ";
            echo "<a href='#' class='petLink' id='".$pet['id']."' >". $pet['name'] . "</a><br>";
            echo "Type: " . $pet['type'] . "<br>";
            echo "<hr><br>";
            
        }

?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="la.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="chicago.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Modal -->
<div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="petNameModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="petInfo"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        
<?php
    include 'inc/footer.php';
?>