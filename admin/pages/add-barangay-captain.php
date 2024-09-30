<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Senior Citizen Information Management System- Add Barangay Captain Details</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../../asset/css/style.css">
   <link rel="stylesheet" href="../../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
 
   <?php include '../includes/header.php';?>
 <?php include '../includes/sidenav.php';?>


      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6 animated bounceInRight">
                     <h1 class="m-0"><span class="fa fa-user-tie"></span> Add Barangay Captain Details</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <section class="content">
    <div class="container-fluid">
        <div class="card card-info">
            <div class="card card-outline card-info">
                <form action="../insert_barangay.php" method="POST">
                    <div class="card-body">

                        <!-- Barangay Captain Information Section -->
                        <div class="form-section">
                            <h6 class="section-title">Barangay Captain Information</h6>
                            <div class="row">

                                <!-- Full Name -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="captain_name">Full Name</label>
                                        <input type="text" id="captain_name" name="captain_name" class="form-control form-field"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>

                                <!-- Barangay Assigned -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="barangay_assigned">Barangay Assigned</label>
                                        <select id="barangay_assigned" name="barangay_assigned" class="form-control form-field" required>
                                            <option value="">Select Barangay</option>
                                            <!-- List of 48 Barangays of Baggao, Cagayan -->
                                            <option value="Adaoag">Adaoag</option>
                                            <option value="Agaman Norte">Agaman Norte</option>
                                            <option value="Agaman Proper">Agaman Proper</option>
                                            <option value="Agaman Sur">Agaman Sur</option>
                                            <option value="Annayatan">Annayatan</option>
                                            <option value="Asassi">Asassi</option>
                                            <option value="Asinga-Via">Asinga-Via</option>
                                            <option value="Awallan">Awallan</option>
                                            <option value="Bacagan">Bacagan</option>
                                            <option value="Bagunot">Bagunot</option>
                                            <option value="Barsat East">Barsat East</option>
                                            <option value="Barsat West">Barsat West</option>
                                            <option value="Bitag Grande">Bitag Grande</option>
                                            <option value="Bitag Pequeño">Bitag Pequeño</option>
                                            <option value="Bunugan">Bunugan</option>
                                            <option value="Canagatan">Canagatan</option>
                                            <option value="Carupian">Carupian</option>
                                            <option value="Catugay">Catugay</option>
                                            <option value="C. Versosa">C. Versosa</option>
                                            <option value="Pobalacion(Centro)">Pobalacion(Centro)</option>
                                            <option value="Dabbac Grande">Dabbac Grande</option>
                                            <option value="Dalin">Dalin</option>
                                            <option value="Dalla">Dalla</option>
                                            <option value="Hacienda Intal">Hacienda Intal</option>
                                            <option value="Ibulo">Ibulo</option>
                                            <option value="Imurung">Imurung</option>
                                            <option value="J. Pallagao">J. Pallagao</option>
                                            <option value="Lasilat">Lasilat</option>
                                            <option value="Mabini">Mabini</option>
                                            <option value="Masical">Masical</option>
                                            <option value="Mocag">Mocag</option>
                                            <option value="Nangalinan">Nangalinan</option>
                                            <option value="Remus">Remus</option>
                                            <option value="San Antonio">San Antonio</option>
                                            <option value="San Francisco">San Francisco</option>
                                            <option value="San Isidro">San Isidro</option>
                                            <option value="San Jose">San Jose</option>
                                            <option value="San Miguel">San Miguel</option>
                                            <option value="San Vicente">San Vicente</option>
                                            <option value="Santa Margarita">Santa Margarita</option>
                                            <option value="Santor">Santor</option>
                                            <option value="Taguing">Taguing</option>
                                            <option value="Taguntungan">Taguntungan</option>
                                            <option value="Tallang">Tallang</option>
                                            <option value="Temblique">Temblique</option>
                                            <option value="Taytay">Taytay</option>
                                            <option value="Tungel">Tungel</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Contact Number -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_number">Contact Number</label>
                                        <input type="number" id="contact_number" name="contact_number"
                                            class="form-control form-field" placeholder="Contact Number" required>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control form-field"
                                            placeholder="Email Address" required>
                                    </div>
                                </div>

                                <!-- Home Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Home Address</label>
                                        <input type="text" id="address" name="address" class="form-control form-field"
                                            placeholder="Home Address" required>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Add Styles for PDF-like Editable Form -->
<style>
    .form-section {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .section-title {
        font-weight: bold;
        margin-bottom: 15px;
        text-transform: uppercase;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
    }
    .form-field {
        border: 1px solid #333;
        box-shadow: none;
    }
    .card-footer {
        text-align: center;
    }
</style>

 <!-- Alerts -->
 <div class="container text-center">
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success" id="success-alert">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                Barangay updated successfully!
            <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                Barangay deleted successfully!
            <?php else: ?>
                Barangay added successfully!
            <?php endif; ?>
        </div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        <div class="alert alert-error" id="error-alert">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                Error updating barangay: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                Error deleting barangay: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php else: ?>
                Error adding barangay: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<style type="text/css">/* Centering alert messages */
.alert {
          padding: 15px;
          margin: 0 auto;
          width: 25%;
          border: 1px solid transparent;
          border-radius: 4px;
          position: fixed;
          top: -800px;
          left: 50%;
          transform: translateX(-50%);
          z-index: 1000;
          display: none;
          border-radius: 50px;
      }
      .alert-success {
          color: #3c763d;
          background-color: #dff0d8;
          border-color: #d6e9c6;
          font-weight: bolder;
      }
      .alert-error {
          color: #a94442;
          background-color: #f2dede;
          border-color: #ebccd1;
      }
</style>
                        <style>
                           /* Card Header */
                           .card-header {
                              font-size: 18px;
                              font-weight: 600;
                              border-bottom: 2px solid #ddd;
                              padding: 10px 20px;
                              margin-bottom: 20px;
                              width: 320px;
                              background-color: steelblue;
                              border-radius: 50px;
                              color: #fff;
                           }

                           /* Optional: Adjusting the font size and weight if needed */
                           .card-header span {
                              display: flex;
                              align-items: center;
                              font-size: 1.2rem;
                           }

                           /* Form Group */
                           .form-group label {
                              font-weight: 500;
                              margin-bottom: 5px;
                              display: block;
                           }

                           /* Form Control */
                           .form-control {
                              border-radius: 4px;
                              border: 1px solid #ced4da;
                              padding: 10px;
                              font-size: 16px;
                           }

                           /* Focus State */
                           .form-control:focus {
                              border-color: #80bdff;
                              box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
                           }

                           /* Responsive adjustments */
                           @media (max-width: 767.98px) {
                              .form-group {
                                 margin-bottom: 15px;
                              }
                           }

                           .alert {
                              padding: 15px;
                              margin: 20px;
                              border: 1px solid transparent;
                              border-radius: 4px;
                              position: fixed;
                              top: 0;
                              right: 0;
                              z-index: 1000;
                              display: none;
                           }

                           .alert-success {
                              color: #3c763d;
                              background-color: #dff0d8;
                              border-color: #d6e9c6;
                           }

                           .alert-error {
                              color: #a94442;
                              background-color: #f2dede;
                              border-color: #ebccd1;
                           }
                        </style>
                            <div class="container text-center">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success" id="success-alert">
                <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                    Barangay Captain updated successfully!
                <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                    Barangay Captain deleted successfully!
                <?php else: ?>
                    Barangay Captain added successfully!
                <?php endif; ?>
            </div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
            <div class="alert alert-error" id="error-alert">
                <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                    Error updating Barangay Captain: <?php echo htmlspecialchars($_GET['message']); ?>
                <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                    Error deleting Barangay Captain: <?php echo htmlspecialchars($_GET['message']); ?>
                <?php else: ?>
                    Error adding Barangay Captain: <?php echo htmlspecialchars($_GET['message']); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>


                        <script src="../asset/jquery/jquery.min.js"></script>
                        <script>
                           $(document).ready(function () {
                              // Show alert if it exists
                              if ($('#success-alert').length > 0) {
                                 $('#success-alert').fadeIn().delay(5000).fadeOut();
                              }
                              if ($('#error-alert').length > 0) {
                                 $('#error-alert').fadeIn().delay(5000).fadeOut();
                              }
                           });
                        </script>
                        <!-- <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Save</button>
                        </div> -->
                     </form>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
   <!-- jQuery -->
   <script src="../../asset/jquery/jquery.min.js"></script>
   <script src="../../asset/js/adminlte.js"></script>

</body>

</html>
