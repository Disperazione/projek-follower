 <script>
     let id = document.getElementById('qw');
     let laba = {{ $pesanan[8] }} - 100000;
     let labaPersen = (laba / 100000) * (100 / 100);
     let fixLaba = labaPersen.toFixed(2);
     let totalLaba = ((fixLaba / 100) * {{ $pesanan[8] }});
     let lebih = Math.round(totalLaba) / 1000;
     console.log(Math.round(lebih));
     if (totalLaba >= 1000) {
         id.innerHTML = Math.round(lebih) + 'K' + ' (' + fixLaba + '%)';
     } else if (totalLaba <= 1) {
         id.innerHTML = '0' + ' (' + 0 + '%)';
     } else {
         id.innerHTML = new Intl.NumberFormat().format(Math.round(totalLaba)) + ' (' + fixLaba + '%)';
     }
 </script>
