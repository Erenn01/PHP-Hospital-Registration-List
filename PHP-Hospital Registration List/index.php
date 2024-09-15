<?php 
    require("cut/function-general.php");
    require ("cut/function.php");
    ini_set("display_errors","0"); 
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziyaretçi Defteri</title>
    
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form{
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        h2{
            text-align: center;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn{
            display: block;
            width: 250px;
            padding: 14px 0;
            font-size: 14px;
            text-align: center;
            background-color: #4CAF50;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            transition: all ease 300ms;
            margin-top: 20px;
        }
        .btn:hover{
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Ziyaretçi Defteri</h2>
                        <script>
                            // Sağ tıklamayı engelle
document.addEventListener('contextmenu', function(e) {
    e.preventDefault(); // Sağ tıklamayı engeller
});

// Kopyalama işlemini engelle
document.addEventListener('copy', function(e) {
    e.preventDefault(); // Kopyalamayı engeller
});

// Kesme işlemini engelle
document.addEventListener('cut', function(e) {
    e.preventDefault(); // Kesme işlemini engeller
});

// Sürükleyip bırakmayı engelle
document.addEventListener('dragstart', function(e) {
    e.preventDefault(); // Sürüklemeyi engeller
});

// Seçimi engelle (isterseniz)
document.addEventListener('selectstart', function(e) {
    e.preventDefault(); // Seçim yapmayı engeller
});
                        </script>
                        <h1>Fotoğraf Ekleme Örneği</h1>
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSExMVFhUVFhUVFRUWFxUVFRUVFhUWFhgVFRUYHSggGBolHRYVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGyslICUtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAFAAIDBAYBBwj/xABCEAABAwIEAwYDBgUCBAcBAAABAAIRAwQFEiExBkFREyJhcYGRobHBBxQyUtHwI0JykuFighWisvEWJDNDU7PCCP/EABkBAAMBAQEAAAAAAAAAAAAAAAABAwIEBf/EACYRAAICAgICAgICAwAAAAAAAAABAhEDIRIxE0EEIlFhFDJScfD/2gAMAwEAAhEDEQA/AAdGxiCida6qCnkB0QtlySrtQy1cjddFErH0rOKZcCm03s7Ig6uVCrWeO7JAXKV2wQydSsugK78wRbh8MJLakbaSn1rZpDQDqSB5LTcJ4FbQ6pVgkHQPIgCNXR+9lhgrsw+J1BTe4UjDfA6HqoLO0rvHax3fnHQK1xJVpPrPFLVjXODT4Ty8F22xd7KPZADYgO5gFFC9kle8dlEElUaOIEugq1RDeznnCGUWS4mFmKWwbDlwZZoVy0aQJlQ2rDspsqwyn7LlJuZEbJkbhULDRaq1q08msTCw0Wiyi2uZRnC6mslArh4zabI3hVJgLTU0nYCSQOvQJxVukabLtWoHFS27dQrN1fWjCGueJiY3MeiiZjFlm3LfEscB7qnh2TbsM067WDVPqHPtoq1s+jUIdTqNdHKf1ROm3XbZU4Sbok3Wx1GlAQS9P8U+i0BWZv8ASqfiuhxUaSMxds0Fie43981OqmFnuepVtWXRh9iSSSTEJJJJACSSSQAk1ycksyVqgGgJJyaVhqhnCuJ0Lim0x2fOooqwCC3xUVOvouV6o5JNLsdktC3z92FVxrCDTh2quWl8afeAlQ4njRqCC0rMaoTBlu+o4taJcXEADmSTAC0mK4DdUKYfWiHaSHZo5wVm8PrupvbUG7XBw8wZC1eMcT1rxjWFrWNbqYnUrEhqjOluURG6a2jpqjn3cPaA0S76+Cp1cPe10PYQem8j0U7HQFFSAdVYsndQq19QcyrBa4a7Ecls+EOw17QAP0AkcjyC2+gSBlHbZd7IlabHeHn02mqA3JvA3AKzgraqTKromt2wUboWb3szDZCaTTOy1eHOfTYGuaQDsTukbAIqhrS90DL10E+Kp4ZxSw1YGZ0nV0afGNPNC/tBv8pFFuk953jOyj4Rw0mHO2XRijxVi3J0F8co1HvNRgmdokaKpb3eTuv7VviYyz5f4XoFpSblAgKZ+HUniC0H0VbN8EYZtZ34mukDXMJaR6jX1Wr4d4xc0hlY5mnZ/wDMPPqPFU7/AISZ+Kk4sPgdFjsTpVrZ8VBIP8w0B9tj5Isy4HvdC4DgCCCCJBHMIBi7x23jGqzvAXEM/wAFzpDtaZPX8p80Ruqh7Yl3NEZtumRlDianCD/D9T9FeQ7A3TTPn9AiK6F0SfYkkkkxCSSSQAkkkkAJJJcKT6ARKaSuErhXLPJZpIRKS4kovIOj5tD+idm6prvBS21KSJVbAK4Xbh26r4tRDdYRS3pBg0IQ7F3A6FHQMC21bMYjRbmzwOmaOaYMfGN1jrctaR5rYUQ3ujMQDtqYIU5MFR3gzBaj6xdIhs+vLTovUMPw5gGrWkjaQJ8SsfglyKDu4JB6akfFNxnjV1N0NBB8VOE1yvso1ok+0l1rSfbuLR2mc6Aa5IMkjzj4rL3bhcuaaI1bHe213AQriTFjcuDo23MySUPwnGH0yY28fDmtv7bM36N7f41VNHJVyjkY3MLIUCHEkdUUq37KtLvETrPWT0U9LD2MogjdRv8AJRBbh+zBAJiRBj2R67qiCXAAAFx58ishYYiaREnQfJTcXYzFq/KdXd303PwBTV3RtI8wxW7N1dlx2c/TwaDAHsvQsLpBrQG7BeZYRrXHgvRLC6eBDWF5G+oaB6ldc10jWL2zYYcZCvtaQsUOJXUz3qDx/SQ5aOxxcVGyNiJHX1CSdFWrDA8UOxbCmV2Fjhvz5g9QhGIcVGm7K2k55G5kNaPUqzhPENSoRLKUc2h8u/RO0xU0YDLUs65ZP4TIO0jeR4r0sX3btp1hs5uvg4aO/X1Cy/2m2QaadYaAyJ5g7if31TPsxvy7t7V/42ntGDkNmuA/5UR07JTVo9LwWpE+iKC4Ky33gsEgwiGH4m1zZlc/zMs8dcSUYphl1wRzUTcSEw7bqEFxDEPFV6dxPNcWP5OWLuzaxJmwY8ESDIXSVmrS+LCiNO6nVegvnprrZJ4Wgqkh1G9gwdldp12nYrpxfIhNdk5QaJElyVXqVk8uaONbBRskqlNDlXdUlMbVC8+c7lZTiWy5JRB6SlyYUfO9JoUj6mVVmBTlmYaruMkr7h3IqlfvJEzqi2AWGes1hGYGdOXqtDjvBXdNRrQ2AZA2U5TUHTGouSPObeqS5s6x8V6bd4lSr0Qym05tNCIykeKynBGH0qtw8VIOQAgeJKNYxdMoVSKcQInop5Z3Liuxx0rJrOrXtxLqZLev+QhGL3PavzHTwWlZxDSq0CCADEH/AAsHd1DJhTxW5NtUxyVLTLFRoA0KGtOqM4Nh/aCSUUHD7OgXoR+PKrIOQAouMQidG8cGwT5Itb4C0cvgrIwdv5R7JS+I2bjOgG2pLhKqca14ptZzOp8zv9fda+1sqU6tEjwXn/F9XNWLRsCf0U/C4SVnTCXJA3CLeHtd6ea017h1w9gFJxAO8fiQHCoz5TuNW+IjUei9DwC6AAWmy0IozWHcN1AdKlTMJjuuIBP5iTBHJa7hu2LarmHaJ8iRqPKUZuLpgYT4IZgtYOrB2okc+YR2xpUtAvGuHXVdi4iTma2AZnSCenRUMP4GOcPaalJwM5jGu2hDdxp8VucQu2USCQcpMF3IE7SusxJkaGUaWrCr3QI44tosmtJzFrma8zvqvNuBr3scQp9HPdSd/u0/6oPovReObsC1nxkeYGnzXjtnVLKmcbtfPqCCmt2Yl6R73jQ7mbrv5rP4be5ZC0FSr2tDlD2Nc3zIkLCUKxDj5lS+QuUSHTNWLnMdU9lQjZAre8RGlcyvOcKKxYTZWKI2t0gjKsq1TqKbRTsOuqynU6qEMrohh4nVPHfIzKKSC1G4IEJmdRVjAVF1wq5pytfgmohMPBB1UDHhDalfomtuF2L5+NJaMeFhbtEkPFUpJ/zIfgPEzxmyqtnVWb8tiWoY0Qn1irom0aLgW6y3MnbKR8VseLuIslJzWtkkRI2ErHcE2pqVtDEDXr5LWY5w+9zHd/lI0+eq4vkxUsqZXGnx0eYYLWLKhIO5RnEGh7SeaG8LWXbXL2H+UmfQwjWMWopPLFSa+5NJ0BbJ+sKe6pNVatTLdU/lKowj0abhen3VobZhmCFn+G7lrW6mFoKGINeYavTi0oojxbYRY0DouuqtUNaicsyhzMz3R0/eqxKTNKJ2+qCHEchK8uvmZnud+9/8r0rHQKVB55xHmTsFg6dtNKo/cyGjzguP0XJke9nZijoAXEtDXgw7OYPkAfqtlgN2XU2P5kaxtmGh+MrMX9GGM/rd9B9CiPCt8GuNB2kklnnzb9fdJ7iai6mal19nJaTAG86Kiy6qMfLajXDYCWjTzVvFbCnXYCR3m6gjQg+BXMKuaTWw+2oucARJdlJMzJaQY9CppWdO36ss071pB7WsDP8AJPdHrCr4fVJJ7M5qZ/C4bbkEA8xoiNaqy4lop0mtdu2mOXdkF+k/h2ACs1stJvJrWjyADR+iJKhu13oA8YVCewpE/wAr3OHiSwNJ9nLzks1f/UVsGXZuqhrxALsjAeTW7fU+pWZaO65w6/EwqR0jmkrZ7JwkztrFo5taWn0+qyGL0nMruM/i15DXnp5ytN9mFaKLmdRPxIPwyoPxJTzvcSIc1xadZknbTlMFZtOBLJGpA6jc6wiVC4QU2dXTK17vBrXH3gIhZ2Nx/wDDV/sd+i5ZwfoUWgxSrK1SrKj90rAa0njzaV2nmG7SPMFc0ossmgq2qieF1SXaLOMqIthN4GHVa+Ol5Fy6DJfHQfvXmEN7UKxd3gcEIfVhW+Yo8vqYxXWy1UeomvUDa0qZlu46tXAsbk6Re0uwsyyeQCknsxJzQAW7JL0lhx17OblI8cv8LrUQczDA5jVCO0ler0H9qIqALB8YYOKT81PYnUfUL1eCW0cak32UMNxN9u7Ox0H5onU46uHtc0u36QgFKxq1AS1jyBuQ0kDzjZWuGMHp1Kp7QmB/KDE+alkxxbtlYTa0aj7GKFA3Fc1iA8taabXGA6S7OfEju+62XG9vYCi+pNMPBGVzXSc06tideenJee3WH27nuYyCRpvt5ILV4Tq0+84ANJ9Y8UePn0Zb49mswe9tKjsrizbTXQlF6eCW1QmCAPA6LDWOEsZEOWrw+tb0BJeJ9ytRwxi7E56JBgDc5a06I7h+Esp6hVMLumvJc3UdUWkEK7S7EpOqLDmgiExluGqJhjmp6dMu0/ysSZpIzXFRmk4+jfq74fuVn6FpltGE/wA5e745fkAtbxfZHsZ031jXYfv2WdxfMy1oNAmWHbWJg++hXBk/s0d2P+qZh8cuBAYOQB9SZPz+CG1ak67HNII3BnktFT4UuroudTaA0Tq6QD4bdUEdYuDyw/yuIJ/1A6/GVuMlQmrZssGxUkAP/F15O8fAo190pOMnbwWfoWndHkr1HM3nopNovGzSWbKLB3UE4mvM9OqR+EMfHj3TqnNcY1MDnyTMZw+q6hDKbndqw9nlBdmBBGkc9NkK5dI06XbBfD1tFo139b/QMb+pQG3oRah5H4nT6ST+i11Kyq0LTsKzDTqMpPa5pIMFzJ3aSDoBsUGxBgFCizbuT8G/qVpyrX7IxV7/AEa/7P3BobyB0jwcAN/MBbiyw6nnL3tGbY+IB0WG4PpfwSRu0j4j9QV6Zbhr6Yd4StfGdtpkvlqkLtWN2HwS+9s6fJONozqfddFswcl6VRPN+xVxC6bl0bKBy2o1wywQi15b9/TZV3WwbJXFmVs6YdGXrWkKCMq0V5QkSgF8CvPy4lHo6YysmpVUnMJVS2crrKijxvs3ZCGwiVjeQYQutUUljXDXS7ZPFGsi2KbuJpC0HVJRi9ppL1vHj/yOTlL8Hl1PHXSYJPRHMNYy9cKZPQ67gLCYDWArtzjRa3Er9tKo19EwfBdc3apEIKnbPS3WtvZ2x0AY0Ek6ar57dWdUq1Kje61znEDaASYWoxriC5uGZHuc5vSAB6xusp9zrA93Y+Chjg47ZWcrJMOxTsqoJHNHuIOKnVWCmG5Qdzr81qfs1e2gxwqU3ZzqXBhM+oCk47u6demWspunqW5Y90/PK+NC8Sq7PK/vNQGA4lH8Iwa9uRNKi54G5Ja0f8xCpWmBva4Er0fhTiX7szs305HUGPhCJ36QRr2QYPQqUB2dVhY8bgx8xujlKsFUvcVFzVzgQAICK4HaB7szh3W/F3IfvwW+X1tg6CWHYYHQ94gHUN5kePQI1Se1ujQB+/ioaTiSQeSY4wVyyyMFso8Qt7RhB6H4hZ7C7NjaZdWhobo2dyPAc1rq9MOGqH1cOYdY99Vy5Iyu0XhlXHiVbap/5ckNDZzZR/0k+K8rbhjmlweIeHEP/qnVexMpA5mdIjpr/wBl49xXf1K91VqVmOZSzNZTa4dkcrJbJDh33O0MnoAFXDjckOOXg3oIsLQNSB5kBI3dIf8AuM/uagrLallJFJxDQC5xe0Nk77M7o8Chd5iVANIbTgxoZMg/Af8AdV/i/llP5a9Ii4kxMVK3ccSxkAbgSNzH72XoFhXysa1tzWa0DutzNIaJBgZmnnC8fp1pctDQx8AAdBG66sSjFUcmSUpuz2KmW1rV9N1R1VwzEOqEOdMaagDlp5LM3XCtzVp0KtKnnZlLTD6cluxIBdJgjYarKYTxa5j9NnaFKljFe2e/7neGi17i80nEFgcTJIa8Fu/MCVLJijklZTHllCJ6BwZTLHPouBBIIggggjWCDz3R26uy1rW5i0yNesOAI+KEcM3RrCnXdWFeq0NNeozLGaYgQAIALQjGK4fn9HGPgY9wFxwi4To68klOFmdZxM5rmlz3Fuh+i3FDFqLqYeHDULzDFbF7AA1pMABPsu1yiWO8l3+VpUef49noV1i7RAnddfeSI6rI4W2s6oC9hAGy07bQuIK52m2VVIsTOiidh4cZhEW0oUjRCfBPsLKTMKZ0Cf8A8Ipfl+at5lzOn44/gXJlP/gtL8vxKTsFo/l+JV3OuFyXjj+A5MGOwSl0+JSRAlcR44/gfJnijcPb0Vplr4LQHshtHsl2zByXRy/RLj+wQy2P5VYt7eHAluyvOuR0TO3RthoLW2IZBAZPrCq3lJ75cYEqn25T/vLoiVlQo05kTLQc1aFrThV5UjCFumYTI7Nv8QMaNXEAeZMBegi3FMMY3Zsa9TIklZTh+iDcMMbHN7DT4wtreN0lQzN0Hs4HQ6eoUlwNj4hR5J9kylUM5Dy+S5m/Q69kjlWxK7ZQpmo8w0e5PIBXA3VZ3jJzHsFEugyHx4CQB6mfZar2EFykkZn/AMYGXOeYBJcOjW8h7K1R40pPEFzXt6GHA+iymLYC6s11NhAzDTUwD+iyd5wNfMGZtMVB1Y4T7Ohair9ndJ8eo2epYrh9jeUagDvu73N/GwQzumRnZMESNYg+K8Puao1AdOsT18R4J11Qr03CnUFRhcQMrszQSdNjoVZxrh64tXMFZkNeJa9pDmEc4cNJHRdMb9nLkae0qBcKcWVSCY2AO4mDtA5nwRG3tXNph34WudoDq8mPxZeX+VtcDwOg+mC6uWvI27NxAM9dBqPmtqJKzzUZmnmD7IldEkNd+YAr15/BVF9CM7apg5pEeWXmPNeZ4zgzrd/ZctXMzaGDqWk7T85CUo0ai7N79h9IVPvLTs0UiPXtP0Xqtayyy7ceH1HNeZfYLT0u3cv4A/8AtP6L11j1DjHlbH5JLXoz1WgyZyhcbSZ+UeyI4pb5e+BpzHQ9fJUA9USC7JKYA5KdtRV2uTsyYiznXCVCHJZkqHY8lclczLoQB1dXNEtEAIlcSlJAHlwaVI1hVptsVO2z8VbRMpimuwArwtgpqVsOiVoKBJPQLonojpoNHJR1KA6I5DoECk5OexzUSLIUNQrLbGkW8DadXzBlo99foFrqNclveGvUc/RZTBmluusOOmsTG/zC1NMHKFzy7GyxRdIHsfTRcYAXk9B81HbcxMg6jz5hPttyfFczX2QFnYT6lec4hcsua9Spm0EMYP8AS2dfXU+qLcdY0Wt7Bh3/APUPSdm/U+ixeFN7+8SFRvRf4+OnyZNXbWpGWDOOkw4e+65S4oc3uVGPZ4ub3f7hI91PWo12GWFrx0PdPvqqlTGCJa+k5piJIlvuEjrJb7HmVstJuR2Yxyd6hCOPLonsLfQhv8RwOwDRlbPufZMZRpm4pvDWyCe8I6HmEI4/xpla5gADIAwuH80aweoBn4q+MhldRIrSoM0gSTu86uPl0C9K4fw6g6mHHMTz7xHwC8jo4sxnIuPsj1l9oVWkMraLI8SV0Jr2cdHsLMFbE0nuaeh1HvuvPvtLw2s5oc5o/hAvz8yJaMum+8+hXcK+15oIFa3IH5qbs0eMGEcxfijDbqiS6tTLHCC12jvIt3CJU0Ebsf8AYbRi1rv/ADVg3+2m0/8A7XpjFmOB/u7aBbQaGtzl5AJdJfBzAkzGnwWlBXG39jUlTomdBEHY6QglahlcR028lfJLj8FWv3Q70CpjycnRmqIQF1MFZLtlUZIF1RisuiqgCVccUztEw1EjRISmFyjLkwpASGokq5C6gQFp2akFEKkMTUrL+VoC42iOif2aqNvwpW3zU9iHuaoy1dNy0roqN6oAr1KZUZop9eqZ0Ki7RyQ0GXW38Kn4D4kyUXsXdwTyVDCnSHUjuCY8Vbod3QqL7Eh9N0OI9Qh2K412DTl/G4nL4csxU1/eNpDO7Ye5PIBYm4quqvL3c+XQdAotU7K48fJ76IHNNTM52smddzO5Q40shmdtkebTgKG0tg+qBybqfGNgstnZSSCeFYQ94zVXOaCAWhsZteZkaeSku+GWunLWI/qaD8oRMlwE6qL7z1Cviin2cc55L+rMjjHDZtmOuA9p7MTAbBM6HWdN145cVS9xceZXvvFVTNZ3LRuaT9OvdXz+Fbil0YcptfcRTjUldA66fJOFsfD0cEzJGEo1XXCNNPRWLPIMzn65WnK38zyIaPIbnySA9r+w69FS0qN/npvDCf8ARGZvzcvSyvH/AP8An+m6Lt38s0m/7gHE/Aj3XrjdTPJcuT+1If7J2kNQXEKh7R0+HyCK9s0IReiajj4quKrpGSEPXQ5M7MroYVYZLK7KYAuoGPL1ztE0qJyQE2dczqAlNzIGWC5JVi4rqKAzTrJycbR8LQGEmwmZozot3DcJppFaN1IFMNsCnYqAQaQmuzI2+zCi+4ap2FApgd4ojhlIueJ2HePpt8YU7bEytPY2DWMEhrTGsAF3qT8licqQdA2jS16OnQqXEL1lNhe/SND1J6DqrOKV6NCmaj2+QnVzuQHILzzEr59d+Z/o0bNHQfqublRXHjc/9D7+/fXfmOgH4W9P1Kko01XosVtphYbs7YxpaFWdAV/ArIwXHmhmr3taOZA9OZ9ltbW1bkA2iD021WO2YySpFWvpA8J/T6qs9jSrgLXkuB02HkP3Kjq266INV/yOOXFveig+iOvuvH/tD4aFrVbUpiKdWdOTXDcDwO49V7JUplZ3jDBzc27mADMO+z+ocvUSFRNp9hwfpnitA8okfH47qY0x+R39pUVWkWkhwII0IOhC4HnqfcqtGLG1QRyjz0RPhXAX31yy3acoMue78rB+J0deQ8SENyr137GMMFNtWu4d54aG9QwE7eZj2U8suMbNQjyZvcCwelY27begIEky7VznHdzjzP8AhXgKh3JPyVii0bn01Tq1xl5eu651BVcjV+kNpthCqzyST1JRT7xIJ02J9kJKtjSXRmjnaFdFRcXCqiJQ5OlVw5d7RBomKY4Joqp7awQA0NXYUgrBcdVCQEchJIvCSYEPZrmRJJJAxw0Xe0CSSYjoqJzXJJJAXMPAzT0E+qI9t7fWUkly5nsPZieNr4urNp8mNn/c7/Ee5Wfa5cSWWd2JVFE7X6qw+pokksMqW+HKeaqHHkCfp9VrL0lrMo3dp6c/09Uklhy4xs48rpkNO20UVQEJJLrxy5RtkYTcuyF9Tqq9V7YmI8kkkOKvRTguNoyXEmF0ajMz2Nc4gnNEHw1CxjsDozsfdJJQjOSvZ0wxxfaCGH4RbtIOST4mfgt5wg8F7m7DLy02I6JJJW5S2WnFRg6RqKdzUYYzZmzzifdEqpDm5gkkrR9o8+fplVz4a72VEuSSVcfRljC5MJXUlUwxjnKMvSSQBzMlmXUkDHBxXM5SSQA3OupJIA//2Q==" alt="" width="300" height="300">
                


<form action="" method="post">

    <label for="adsoyad">Kullanıcı Adı:</label>
    <input type="text" id="adsoyad" name="adsoyad" placeholder="Lütfen kullanıcı adınızı giriniz!" required>
    
    <label for="tel">Telefon Numarası:</label>
    <input type="text" id="tel" name="tel" placeholder="Lütfen telefon numaranızı giriniz!" required>
    
    <label for="mesaj">Mesaj:</label>
    <textarea id="mesaj" name="mesaj" rows="4" required></textarea> 
    <input type="submit" value="Gönder">
<?php

if($_POST){
    $kullaniciadi =trim($_POST['adsoyad']);
    $tel =trim($_POST['tel']);
    $mesaj =trim($_POST['mesaj']);

    if(!$kullaniciadi || !$tel || !$mesaj){
        echo"lütfen boş bırakılan alanları doldurunuz!";
    }
    else{
    $pdo = Database::db();  
    $stmt = $pdo->prepare("INSERT INTO notlar(`username`,`number`, `message`) VALUES (?,?,?)");
    $result = $stmt->execute([$kullaniciadi,$tel,$mesaj]);
    if($result)
    {
        echo "teşekkürler işlem başarılı.";
        header("refresh:0");
        exit();
    }
    else{
        echo "veritabanı hatası ile işlem tamamlanamadı!";
    }
}
}
    if(isset($_POST["zgoster"])){
    header("Location: login.php");
        exit();
    }
?>
</form>
<a href="login.php" class="btn">Ziyaretçi listesini görmek için tıkla</a>
</body>
</html> 
 
