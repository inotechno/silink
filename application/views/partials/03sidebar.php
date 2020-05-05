        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                       <?php
                      // data main menu
                        $main_menu = $this->db->get_where('menus', 
                                                  array('sub_menu' => 0, 'level_menu' => $this->session->userdata('level')));
                        foreach ($main_menu->result() as $main) {
                            // Query untuk mencari data sub menu
                            $sub_menu = $this->db->get_where('menus', 
                                                  array('sub_menu' => $main->id, 'level_menu' => $this->session->userdata('level')));
                            // periksa apakah ada sub menu
                      if ($sub_menu->num_rows() > 0) {?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="<?= $main->icon ?>" class="feather-icon"></i><span
                                    class="hide-menu"><?= $main->nama_menu ?> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                
                                <?php foreach ($sub_menu->result() as $sub) {?>
                                  <li class="sidebar-item">
                                    <a href="<?= base_url($this->session->userdata('link')) ?>/<?= $sub->link ?>" class="sidebar-link">
                                      <span class="hide-menu"> <?= $sub->nama_menu ?></span>
                                    </a>
                                  </li>
                                <?php } ?>
                                
                            </ul>
                        </li>
                      <?php } else { ?>
                        <li class="sidebar-item"> 
                          <a class="sidebar-link sidebar-link" href="<?= base_url($this->session->userdata('link')) ?>/<?= $main->link ?>" aria-expanded="false">
                                <i data-feather="<?= $main->icon ?>" class="feather-icon">
                                </i>
                                <span class="hide-menu"><?= $main->nama_menu ?></span>
                          </a>
                        </li>
                      <?php }
                      } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

         <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-md-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                          <?php 
                            date_default_timezone_set("Asia/Jakarta");

                            $b = time();
                            $hour = date("G",$b);

                            if ($hour>=0 && $hour<=11)
                            {
                            echo "Selamat Pagi";
                            }
                            elseif ($hour >=12 && $hour<=14)
                            {
                            echo "Selamat Siang ";
                            }
                            elseif ($hour >=15 && $hour<=17)
                            {
                            echo "Selamat Sore ";
                            }
                            elseif ($hour >=17 && $hour<=18)
                            {
                            echo "Selamat Petang ";
                            }
                            elseif ($hour >=19 && $hour<=23)
                            {
                            echo "Selamat Malam ";
                            }
                          ?>
                          <?= $this->session->userdata('nama_lengkap'); ?></h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                  <?php
                                    $segment1 = ucfirst($this->uri->segment(1));
                                    $segment2 = ucfirst($this->uri->segment(2));
                                    $segment3 = ucfirst($this->uri->segment(3));
                                    if ($this->uri->segment(1) != '') {
                                      echo '<li class="breadcrumb-item">
                                              <a href="'.base_url($segment1).'">'.str_replace('_', ' ', $segment1).'
                                              </a>
                                            </li>';
                                     if ($this->uri->segment(2) != '') {
                                      echo '<li class="breadcrumb-item">
                                              <a href="'.base_url($segment1."/".$segment2).'">'.str_replace('_', ' ', $segment2).'
                                              </a>
                                            </li>';
                                     if ($this->uri->segment(3) != '') {
                                      echo '<li class="breadcrumb-item">
                                              <a href="'.base_url($segment1."/".$segment2."/".$segment3).'">'.str_replace('_', ' ', $segment3).'
                                              </a>
                                            </li>';
                                        }
                                      }
                                    } 
                                    ?>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-5  mt-2 align-self-center">
                        <div class="customize-input float-right">
                            <span class="form-control bg-white border-0 custom-shadow custom-radius text-muted">
                                <p class="d-inline" id="haritanggal"></p> <p class="d-inline" id="clock"></p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->