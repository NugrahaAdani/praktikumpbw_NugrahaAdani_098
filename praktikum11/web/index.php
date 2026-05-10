<?php
session_start();
if (!isset($_SESSION['login_web'])) {
header("Location: login.php?message=" .
urlencode("harap login terlebih dahulu!"));
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../src/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.22.0/dist/tf.min.js"></script>
    
    <title>Cancer Prediction</title>
</head>
<body class="min-h-screen bg-dark-gradient font-jakarta">
    <!-- Navigasi -->
    <div class="bg-blue-950/60 backdrop-blur-sm text-white p-5 flex border-b border-white/10 items-center justify-center sticky top-0 z-50">
        <h3 class="text-ijo font-semibold">Melanoma Cancer Prediction</h3>

        <form 
        id="logoutForm"
        action="proses_logout.php" 
        method="post" 
        class="ml-auto">

            <button 
            id="logoutButton"
            type="button" 
            class="group bg-ijo px-3 py-1 rounded-md font-semibold hover:bg-blue-400 transition duration-300 ease-in-out">
                <span class="text-dark-gradient group-hover:text-white group-hover:bg-none group-hover:[-webkit-text-fill-color:white] duration-300 ease-in-out">
                |> Logout
                </span>
            </button>
        </form>
    </div>
    
    <!-- Logout verifikasi -->
    <div id="logoutModal" class="fixed inset-0 hidden items-center justify-center bg-black/50 backdrop-blur-sm z-50">
        <div class="bg-white rounded-lg p-6 w-80 text-center">
            <h3 class="text-xl font-bold text-slate-900 mb-2">Logout?</h3>
            <p class="text-slate-600 mb-6">Yakin ingin keluar dari akun?</p>

            <div class="flex gap-3">
                <button id="cancelLogout" type="button" class="w-full border border-slate-300 py-2 rounded-md">
                    Batal
                </button>

                <button id="confirmLogout" type="button" class="w-full bg-ijo py-2 rounded-md font-semibold">
                    Ya, Logout
                </button>
            </div>
        </div>
    </div>
    
    <!-- Judul/Header -->
    <div class="flex flex-col items-center">
        <div class="text-white flex flex-col pt-6 pb-6 items-center justify-center py-10">
            <h1 class="font-semibold md:text-5xl">Deteksi Dini <span class="text-ijo">Melanoma</span> dengan Kecerdasan Buatan</h1>
            <p class="mt-4 text-slate-300 text-lg max-w-2xl text-center leading-relaxed">Upload foto lesi kulit Anda dan dapatkan analisis risiko melanoma berbasis model deep learning yang terlatih dari ribuan kasus klinis.</p>
    </div>

    <!-- Upload file -->
    <div class="w-full max-w-5xl mx-auto bg-black/30 backdrop-blur-md text-white p-10 border border-ijo/30 rounded-t-lg flex flex-col items-center justify-center">
        <label for="imageUpload" class="w-full max-w-full min-h-80 p-5 border-4 border-dashed border-ijo/60 rounded-2xl bg-slate-900/40 flex flex-col items-center justify-center text-center cursor-pointer hover:border-ijo hover:bg-ijo/5">
            <div class="w-20 h-20 rounded-2xl bg-ijo/10 border border-ijo/30 flex items-center justify-center mb-8">
                <span class="text-ijo text-5xl">↥</span>
            </div>
            <h3 class="text-white text-2xl font-bold mb-4">
                Drag & drop foto lesi kulit di sini
            </h3>
            <p class="text-slate-400 text-xl mb-4">
                atau klik untuk memilih file
            </p>
            <p class="text-slate-500">
                Format: JPG, PNG, WEBP • Maks. 10 MB • Resolusi ≥ 224x224 px
            </p>
            <input 
                id="imageUpload"
                type="file"
                accept="image/png, image/jpeg, image/webp"
                class="hidden">
                <img 
                id="previewImage" 
                class="hidden mt-6 max-h-64 rounded-lg border border-white/20 object-contain" 
                alt="preview gambar">
        </label>
    </div>

    <!-- Analisis Button -->
    <div class="w-full max-w-5xl mx-auto bg-black/30 backdrop-blur-md text-white p-10 border border-ijo/30 rounded-b-lg flex flex-col items-center justify-center">
        <button 
            id="analisisButton"
            type="button"
            class="group bg-ijo px-6 py-2 rounded-md font-semibold hover:bg-ijo/60 transition duration-300 ease-in-out">
                <span class="text-dark-gradient">
                Mulai Analisis
                </span>
        </button>
        <p id="analysisStatus" class="mt-4 text-sm text-slate-400">Model sedang dimuat...</p>
    </div>

    <!-- Hasil analisis -->
    <div id="analysisResult" class="hidden w-full max-w-5xl mx-auto mt-8 bg-slate-950/60 backdrop-blur-md text-white p-10 border border-ijo/20 rounded-2xl">
        <h2 class="text-slate-400 text-lg font-semibold tracking-widest mb-8">HASIL ANALISIS</h2>

        <div class="flex flex-col items-center justify-center text-center">
            <div class="relative w-56 h-56 flex items-center justify-center">
                <svg class="w-56 h-56 -rotate-90" viewBox="0 0 120 120">
                    <circle cx="60" cy="60" r="48" fill="none" stroke="rgba(148, 163, 184, 0.16)" stroke-width="12"></circle>
                    <circle id="riskCircle" cx="60" cy="60" r="48" fill="none" stroke="#22c55e" stroke-width="12" stroke-linecap="round" stroke-dasharray="301.59" stroke-dashoffset="301.59"></circle>
                </svg>
                <div class="absolute flex flex-col items-center">
                    <span id="riskPercent" class="text-5xl font-bold">0%</span>
                    <span class="text-slate-400 tracking-widest mt-2">RISIKO</span>
                </div>
            </div>

            <div id="riskBadge" class="mt-7 px-7 py-3 rounded-full border border-ijo/40 bg-ijo/10 text-ijo font-bold tracking-widest">
                Menunggu hasil
            </div>

            <p id="riskDescription" class="mt-6 text-slate-400 text-xl max-w-3xl leading-relaxed">
                Upload gambar lalu mulai analisis untuk melihat estimasi risiko.
            </p>

            <div class="mt-8 flex flex-wrap gap-3 justify-center text-slate-400">
                <span id="asymmetryChip" class="border border-slate-700/40 bg-white/5 rounded-md px-4 py-2">Asimetri: -</span>
                <span id="borderChip" class="border border-slate-700/40 bg-white/5 rounded-md px-4 py-2">Border: -</span>
                <span id="colorChip" class="border border-slate-700/40 bg-white/5 rounded-md px-4 py-2">Warna: -</span>
                <span id="diameterChip" class="border border-slate-700/40 bg-white/5 rounded-md px-4 py-2">Diameter: -</span>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full bg-blue-950/60 backdrop-blur-sm p-3 mt-12 text-center text-white/60 border-t border-white/10">
        <p>&copy; Melanoma Cancer &bull; Dibuat untuk deteksi dini kanker kulit</p>
    </footer>

    <script>
        // logout
        const logoutForm = document.getElementById("logoutForm");
        const logoutButton = document.getElementById("logoutButton");
        const logoutModal = document.getElementById("logoutModal");
        const cancelLogout = document.getElementById("cancelLogout");
        const confirmLogout = document.getElementById("confirmLogout");

        logoutButton.addEventListener("click", () => {
        logoutModal.classList.remove("hidden");
        logoutModal.classList.add("flex");
        });

        cancelLogout.addEventListener("click", () => {
        logoutModal.classList.add("hidden");
        logoutModal.classList.remove("flex");
        });

        confirmLogout.addEventListener("click", () => {
        logoutForm.submit();
        });

        // preview image
        const imageUpload = document.getElementById("imageUpload");
        const previewImage = document.getElementById("previewImage");
        const analisisButton = document.getElementById("analisisButton");
        const analysisStatus = document.getElementById("analysisStatus");
        const analysisResult = document.getElementById("analysisResult");
        const riskCircle = document.getElementById("riskCircle");
        const riskPercent = document.getElementById("riskPercent");
        const riskBadge = document.getElementById("riskBadge");
        const riskDescription = document.getElementById("riskDescription");
        const asymmetryChip = document.getElementById("asymmetryChip");
        const borderChip = document.getElementById("borderChip");
        const colorChip = document.getElementById("colorChip");
        const diameterChip = document.getElementById("diameterChip");
        let melanomaModel = null;
        let modelLoadFailed = false;
        let modelLoadError = "";

        async function loadMelanomaModel() {
            try {
                if (typeof tf === "undefined") {
                    throw new Error("TensorFlow.js tidak berhasil dimuat dari CDN.");
                }

                const modelUrl = new URL(`../tfjs_model/model.json?v=${Date.now()}`, window.location.href).href;
                melanomaModel = await tf.loadLayersModel(modelUrl);
                modelLoadFailed = false;
                modelLoadError = "";
                analysisStatus.textContent = "Model siap. Pilih gambar untuk mulai analisis.";
            } catch (error) {
                modelLoadFailed = true;
                modelLoadError = error.message;
                analysisStatus.textContent = `Model gagal dimuat: ${modelLoadError}`;
                console.error("Gagal memuat model TFJS:", error);
            }
        }

        imageUpload.addEventListener("change", function () {
        const file = this.files[0];

        if (!file) {
            previewImage.classList.add("hidden");
            previewImage.src = "";
        return;
        }

        previewImage.src = URL.createObjectURL(file);
        previewImage.classList.remove("hidden");
        if (!modelLoadFailed) {
            analysisStatus.textContent = melanomaModel ? "Gambar siap dianalisis." : "Model masih dimuat...";
        }
        });

        function getRiskLevel(score) {
            if (score < 0.35) {
                return {
                    label: "RISIKO RENDAH",
                    color: "#22c55e",
                    description: "Karakteristik lesi tampak berisiko rendah. Tetap lakukan pemeriksaan kulit rutin setiap tahun.",
                    chips: ["Asimetri: Rendah", "Border: Reguler", "Warna: Seragam", "Diameter: <4mm"]
                };
            }

            if (score < 0.7) {
                return {
                    label: "RISIKO SEDANG",
                    color: "#f59e0b",
                    description: "Model menemukan beberapa pola yang perlu diperhatikan. Pertimbangkan konsultasi dengan tenaga medis.",
                    chips: ["Asimetri: Sedang", "Border: Perlu dicek", "Warna: Bervariasi", "Diameter: 4-6mm"]
                };
            }

            return {
                label: "RISIKO TINGGI",
                color: "#ef4444",
                description: "Model mendeteksi pola berisiko tinggi. Segera konsultasikan dengan dokter kulit untuk pemeriksaan lanjutan.",
                chips: ["Asimetri: Tinggi", "Border: Tidak reguler", "Warna: Tidak seragam", "Diameter: >6mm"]
            };
        }

        function renderAnalysis(score) {
            const percent = Math.round(score * 100);
            const level = getRiskLevel(score);
            const circumference = 301.59;

            riskPercent.textContent = `${percent}%`;
            riskCircle.style.stroke = level.color;
            riskCircle.style.strokeDashoffset = circumference - (circumference * percent / 100);
            riskBadge.textContent = level.label;
            riskBadge.style.color = level.color;
            riskBadge.style.borderColor = level.color;
            riskBadge.style.backgroundColor = `${level.color}22`;
            riskDescription.textContent = level.description;
            asymmetryChip.textContent = level.chips[0];
            borderChip.textContent = level.chips[1];
            colorChip.textContent = level.chips[2];
            diameterChip.textContent = level.chips[3];
            analysisResult.classList.remove("hidden");
        }

        analisisButton.addEventListener("click", async () => {
            if (!melanomaModel) {
                analysisStatus.textContent = modelLoadFailed
                    ? `Model gagal dimuat: ${modelLoadError}`
                    : "Model belum siap, tunggu sebentar.";
                return;
            }

            if (!previewImage.src) {
                analysisStatus.textContent = "Pilih gambar terlebih dahulu.";
                return;
            }

            analysisStatus.textContent = "Menganalisis gambar...";

            try {
                const inputTensor = tf.tidy(() => {
                    return tf.browser.fromPixels(previewImage)
                        .resizeBilinear([224, 224])
                        .toFloat()
                        .div(255)
                        .expandDims(0);
                });

                const prediction = melanomaModel.predict(inputTensor);
                const score = (await prediction.data())[0];

                inputTensor.dispose();
                prediction.dispose();

                renderAnalysis(score);
                analysisStatus.textContent = "Analisis selesai.";
            } catch (error) {
                analysisStatus.textContent = "Analisis gagal. Coba pilih gambar lain.";
                console.error(error);
            }
        });

        loadMelanomaModel();
    </script>

</body>
</html>
