function cekNilai(){
    let nim = document.getElementById("nim").value;
    let nama = document.getElementById("nama").value;
    let nilai = parseInt(document.getElementById("angka").value);

    let huruf = "";
    if(nilai >= 80 && nilai <= 100){
        huruf = "A";
    }
    else if(nilai >= 70 && nilai < 80){
        huruf = "B";
    }
    else if(nilai >= 60 && nilai < 70){
        huruf = "C";
    }
    else if(nilai >= 50 && nilai < 60){
        huruf = "D";
    }
    else if(nilai >= 0 && nilai < 50){
        huruf = "E";
    }
    else {
        huruf = "Nilai tidak valid!";
    }

    document.getElementById("hasil").innerHTML = 
        "NIM: " + nim + "<br>" +
        "Nama: " + nama + "<br>" +
        "Huruf Mutu: " + huruf;

}