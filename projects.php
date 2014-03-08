<?php 
session_start();
$session = $_SESSION;
session_write_close();

function autoLoader($class)
{
    $path = "classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

$db = new mysqlManager();
if(!empty($session["iduser"]))
{
	
	$data = $db->selectRecord('user',NULL,Array("iduser" => $session["iduser"]));
	
	$user = new user($data->data[0]);
	
}
require_once('templates/hea.php');
?>
	<div class="cont2 sections" data-id="2">
		
		
		<div class="bod projects">
			<?php 
			$projects = $db->selectRecord('project',NULL,Array("status" => 1), Array('created_date' => 'desc'));
			foreach($projects->data as $pro)
			{
				?>
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><span><?php  echo $pro->name ?></span> <span class="smallTitle"><?php echo $pro->note ?></span>
					</h3><?php #echo $pro->url === NULL ? "" : '<a href="' . $pro->url . '">Visit the site</a>'; ?>
					
					<input type="hidden" value="<?php  echo $pro->idprojects ?>" class="idproject">
				</div>
				<?php
			}
			?>
			<div class="proyImgWrap projectData">
				
			</div>
			<script>
				$('.proyTitle').click(function()
				{
					var idpro =  $(this).siblings('.idproject').val();
					$.ajax({
						type : 'POST',
						url : 'functions/get_proj_data.php',
						data : {idproject : idpro}
					}).done(function(htm)
					{
						$('.projectData').html(htm);
					})
				});
			</script>
			
			<?php /*
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="http://www.tumall.do">tuMall</a> <span class="smallTitle">(in the oven)</span></h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-4.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-5.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-6.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-7.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-8.jpg" />
						</span>
					</div>
				</div>
				
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="https://www.facebook.com/BLUECOUNTRYJEANS/app_208195102528120">First Audiovisual Festival - Blue Country</a> </h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-4.jpg" />
						</span>
<!--
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-5.jpg" />
						</span>
-->
					</div>
				</div>
				
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="http://www.sun-age.org">Sunage</a> <span class="smallTitle">(Colab with <a class="inAnchor" target="_blank" href="http://www.olivo.do">Olivo.do</a>)</span></h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-4.jpg" />
						</span>
<!--
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-5.jpg" />
						</span>
-->
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-6.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-7.jpg" />
						</span>
					</div>
				</div>

				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="http://www.dreamcher.com">Dreamcher</a></h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-4.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-5.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-6.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-7.jpg" />
						</span>
					</div>
				</div>
			 * 
			 */
			?>				
				
		</div>
	</div>

	
<?php 
require_once('templates/foo.php');

?>