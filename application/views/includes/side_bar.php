		<div id="menu-bar-wrapper">
			<div id="current-user-info">
				<div id="user-picture"></span></div>
				<div id="user-name-container">
					<div id="user-name">Abdul Hadi</div>
					<div id="login-link">Log Out</div>			
				</div>
			</div>
			<div id="menu-bar">
			<!-- ________________Master Data____________  -->
				<div id="master-data" class="menu-block" onclick="toggleSideBar(this)">
					<div class="master-data-ico"></div> 
					<div class="menu-name">Master Data</div>
					<div class="right-arrow-ico"></div>				
				</div>
					<div id="master-data-child-wrapper" class="menu-child-wrapper">
						<div id="data-barang" class="menu-child" onclick="select_menu(this)" linkMenu="<?php echo site_url('barang')?>">
							<div class="data-barang-ico menu-child-ico"></div> 
							<div class="menu-name">Barang</div>
						</div>
						<div id="data-satuan" class="menu-child">
							<div class="data-satuan-ico menu-child-ico"></div> 
							<div class="menu-name">Satuan</div>						
						</div>					
						<div id="data-jenis" class="menu-child">
							<div class="data-jenis-ico menu-child-ico"></div> 
							<div class="menu-name">Jenis</div>
						</div>					
						<div id="data-supplier" class="menu-child">
							<div class="data-supplier-ico menu-child-ico"></div> 
							<div class="menu-name">Supplier</div>
						</div>					
					</div>
				<!-- _______________________________________ -->
				<!-- ___________________Transaksi____________________ -->
				<div id="transaksi" class="menu-block" onclick="toggleSideBar(this)">
					<div class="transaksi-ico"></div>
					<div class="menu-name">Transaksi</div>
					<div class="right-arrow-ico"></div>
				</div>
					<div id="transaksi-child-wrapper" class="menu-child-wrapper">
						<div id="penjualan" class="menu-child" onclick="select_menu(this)" linkMenu="<?php echo site_url('jual')?>">
							<div class="data-barang-ico menu-child-ico"></div> 
							<div class="menu-name">Penjualan</div>
						</div>
						<div id="pembelian" class="menu-child">
							<div class="data-satuan-ico menu-child-ico"></div> 
							<div class="menu-name">Pembelian</div>					
						</div>					
						<div id="hutang" class="menu-child">
							<div class="data-jenis-ico menu-child-ico"></div> 
							<div class="menu-name">Hutang</div>
						</div>					
						<div id="piutang" class="menu-child">
							<div class="data-supplier-ico menu-child-ico"></div> 
							<div class="menu-name">Piutang</div>
						</div>					
					</div>					
				<!-- _________________________________________ -->
				<!-- ____________________Laporan_____________ -->
				<div id="laporan" class="menu-block" onclick="toggleSideBar(this)">
					<div class="laporan-ico"></div>
					<div class="menu-name">Laporan</div>
					<div class="right-arrow-ico"></div>
				</div>
					<div id="laporan-child-wrapper" class="menu-child-wrapper">
						<div id="arus-kas" class="menu-child">
							<div class="data-barang-ico menu-child-ico"></div> 
							<div class="menu-name">Arus Kas</div>
						</div>
						<div id="pendapatan" class="menu-child">
							<div class="data-satuan-ico menu-child-ico"></div> 
							<div class="menu-name">Pendapatan</div>						
						</div>					
						<div id="barang-laris" class="menu-child">
							<div class="data-jenis-ico menu-child-ico"></div> 
							<div class="menu-name">Barang yang Paling Laris</div>
						</div>					
						<div id="stok-barang" class="menu-child">
							<div class="data-supplier-ico menu-child-ico"></div> 
							<div class="menu-name">Stok Barang</div>
						</div>					
					</div>									
				<!-- __________________________________ -->
			</div>
		</div>		