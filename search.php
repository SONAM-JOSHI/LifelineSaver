<?php 
extract($_POST);
	//include header file
	include ('include/header.php');
	if(isset($_POST['blood_group'])&& isset($_POST['city'])){
		$blood_group = $_POST['blood_group'];
		$city = $_POST['city'];
		
	}
?>
<style>
.size {
    min-height: 0px;
    padding: 60px 0 40px 0;

}

.loader {
    display: none;
    width: 69px;
    height: 89px;
    position: absolute;
    top: 25%;
    left: 50%;
    padding: 2px;
    z-index: 1;
}

.loader .fa {
    color: #e74c3c;
    font-size: 52px !important;
}

.form-group {
    text-align: left;
}

h1 {
    color: white;
}

h3 {
    color: #e74c3c;
    text-align: center;
}

.red-bar {
    width: 25%;
}

span {
    display: block;
}

.name {
    color: #e74c3c;
    font-size: 22px;
    font-weight: 700;
}

.donors_data {
    background-color: white;
    border-radius: 5px;
    margin: 25px;
    -webkit-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    -moz-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    padding: 20px 10px 20px 30px;
}
</style>
<div class="container-fluid red-background size">
    <div class="row">
        <div class="ccol-md-6 offset-md-3">
            <h1 class="text-center">Search Donors</h1>
            <hr class="white-bar">
            <br>
            <div class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
                <div class="form-group text-center center-aligned">

                    <select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default"
                        required>
                        <option value="">-- Select --</option>
                        <optgroup title="Province No 1)" label="&raquo; Province No 1">

                        </optgroup>
                        <option value="Ilam">Ilam</option>
                        </optgroup>
                        <option value="Birtamode">Birtamode</option>
                        </optgroup>
                        <option value="Damak">Damak</option>
                        </optgroup>
                        <option value="Itahari">Itahari</option>
                        <option value="Dharan">Dharan</option>

                        <optgroup title="Province No 2" label="&raquo; Province No 2"></optgroup>
                        <option value="Biratnagar">Biratnagar</option>
                        <option value="Saptari">Saptari</option>
                        <option value="Saptari">Janakpur</option>

                        <optgroup title="Province No 3" label="&raquo; Province No 3"></optgroup>
                        <option value="Kathamndu">Kathamndu</option>
                        <option value="Bhaktapur">Bhaktapur</option>
                        <option value="Lalitpur">Lalitpur</option>
                        <option value="Lalitpur">Hetauda</option>

                        <optgroup title="Province No 4" label="&raquo; Province No 4"></optgroup>
                        <option value="Pokhara">Pokhara</option>
                        <option value="Damauli">Damauli</option>
                        <option value="Waling">Waling</option>
                        <option value="Baglungbazar">Baglungbazar</option>

                        <optgroup title="Province No 5" label="&raquo; Province No 5"></optgroup>
                        <option value="Butwal">Butwal</option>
                        <option value="Bhairahawa">Bhairahawa</option>
                        <option value="Nepaljung">Nepaljung</option>
                        <option value="Ghorahi">Ghorahi</option>
                        <option value="Tulsipur">Tulsipur</option>

                        <optgroup title="Province No 6" label="&raquo; Province No 6"></optgroup>
                        <option value="Birendranagar">Birendranagar</option>

                        <optgroup title="Province No 7" label="&raquo; Province No 7"></optgroup>
                        <option value="Dhangadhi">Dhangadhi</option>
                        <option value="Mahendranagar">Mahendranagar</option>
                        <option value="Tikapur">Tikapur</option>
                        <option value="Bhimdutta">Bhimdutta</option>

                    </select>
                </div>
                <div class="form-group center-aligned">
                    <select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;"
                        class="form-control demo-default text-center margin10px">

                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>
                </div>
                <div class="form-group center-aligned">
                    <button type="button" class="btn btn-lg btn-default" id="search">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding: 60px 0 60px 0;">
    <div class="row " id="data">

        <!-- Display The Search Result -->
        <?php 
		if((isset($_GET['city'])&& !empty($_GET['city'])) && (isset($_GET['blood_group']) &&!empty($_GET['blood_group']))){
			

		
		$city= $_GET['city'];
		$blood_group=$_GET['blood_group'];
		$sql = "SELECT * FROM donor WHERE city= '$city' AND blood_group='$blood_group'";

		$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {

				if ($row['save_life_date'] == '0') {	
					echo '
					<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
					<span class="name">' . $row['name'] . '</span>
					<span>' . $row['city'] . '</span>
					<span>' . $row['blood_group'] . '</span>
					<span>' . $row['gender'] . '</span>
					<span>' . $row['contact_no'] . '</span>
					<span>' . $row['email'] . '</span>
					<h4 class="name text-center">Donor</h4>
					</div>
					
					
					
				';

				} else {
					echo '
					<div class="col-md-3 col-sm-12 col-lg-3 ,donors_data">
					<span class="name">' . $row['name'] . '</span>
					<span>' . $row['city'] . '</span>
					<span>' . $row['blood_group'] . '</span>
					<span>' . $row['gender'] . '</span>
					<h4 class="name text-center">Donated</h4>
					</div>';

				}
			}
		} else {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data Not Found</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div> ';
		}
	}
		
		
		
		?>

    </div>
</div>
<div class="loader" id="wait">
    <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>
<?php 

	//include footer file
	include ('include/footer.php');
	include ('include/navigation.php'); 

?>

<script type="text/javascript">
$(function() {

    $("#search").on('click', function() {

        var city = $("#city").val();
        var blood_group = $("#blood_group").val();
        $.ajax({

            type: 'GET',
            url: 'ajaxsearch.php',
            data: {
                city: city,
                blood_group: blood_group
            },
            success: function(data) {
                if (!data.error) {
                    $("#data").html(data);
                }
            }
        });

    });


});
</script>