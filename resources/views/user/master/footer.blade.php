<div>
    <!-- Footer -->
    <img src="{{asset('asset/image/kincir.jpeg')}}" alt="Kota" class="img-kota" style="height: 400px; object-fit: cover;">
    <section class="footer-area py-3" style="font-size: 0.9rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="footer-card">
                        <div class="card footer-card">
                            <img src="{{asset('asset/image/FIX.png')}}" alt="Logo" class="link-image">
                        </div>
                        <p class="footer-text">Ecopulse merupakan suatu lembaga yang bergerak di bidang energi bersih terbaharukan, fokus ecopulse disini itu sediri menjadikan desa desa di lingkup bandung raya menjadi mempunyai energi yang bisa di pakai untung generasi generasi kedepannya.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <p class="footer-title fw-bold mb-1">Alamat</p>
                    <ul class="list-unstyled mb-0">
                        <li class="footer-judul" style="font-size: 0.85rem;">Jl. Soekarno-Hatta No.576, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286</li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <p class="footer-title fw-bold mb-1">Telephone</p>
                    <ul class="list-unstyled mb-0">
                        <li class="footer-judul" style="font-size: 0.85rem;">+22-3214458</li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 mb-2">
                    <p class="footer-title fw-bold mb-1">Surel</p>
                    <ul class="list-unstyled mb-0">
                        <li class="footer-judul" style="font-size: 0.85rem;">admin.Ecopulse@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12 text-center">
                    <p class="footer-main-title mb-0" style="font-size: 0.8rem;">© <?php echo date("Y"); ?> Ecopulse</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Scroll Back To Top -->
    <button onclick="topFunction()" id="totop" title="Go to top" style="width: 40px; height: 40px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
        </svg>
    </button>
</div>
<script>
  // Fungsi untuk scroll ke atas secara halus
  function topFunction() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // Tampilkan tombol saat scroll ke bawah 100px
  window.onscroll = function() {
    const totop = document.getElementById("totop");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      totop.style.display = "block";
    } else {
      totop.style.display = "none";
    }
  };
</script>



