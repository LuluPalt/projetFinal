function drawGraph(max, d1, d2, d3, d4, d5, d6, d7, d8, v1, v2, v3, v4, v5, v6, v7, v8){
    const canvas = document.getElementById("Canvas");
    const image = canvas.getContext("2d");
    h1 = 350-(300/max)*v1;
    h2 = 350-(300/max)*v2;
    h3 = 350-(300/max)*v3;
    h4 = 350-(300/max)*v4;
    h5 = 350-(300/max)*v5;
    h6 = 350-(300/max)*v6;
    h7 = 350-(300/max)*v7;
    h8 = 350-(300/max)*v8;
    image.fillStyle = "#FFFFFF";
    image.fillRect(0,0,900,400);
    image.moveTo(50, 50);
    image.lineTo(50, 350);
    image.stroke();
    image.moveTo(50, 350);
    image.lineTo(850, 350);
    image.stroke();
    image.fillStyle = "#000000";
    image.font = "15px Arial";
    image.fillText(max, 20, 50);
    image.fillText(d8, 55, 375);
    image.fillText("|", 140, 375);
    image.fillText(d7, 150, 375);
    image.fillText("|", 235, 375);
    image.fillText(d6, 245, 375);
    image.fillText("|", 330, 375);
    image.fillText(d5, 340, 375);
    image.fillText("|", 425, 375);
    image.fillText(d4, 435, 375);
    image.fillText("|", 520, 375);
    image.fillText(d3, 530, 375);
    image.fillText("|", 615, 375);
    image.fillText(d2, 625, 375);
    image.fillText("|", 710, 375);
    image.fillText(d1, 720, 375);
    image.fillStyle = "#9e3131";
    image.fillRect(70, h8, 50, 350-h8);
    image.fillRect(165, h7, 50, 350-h7);
    image.fillRect(260, h6, 50, 350-h6);
    image.fillRect(355, h5, 50, 350-h5);
    image.fillRect(450, h4, 50, 350-h4);
    image.fillRect(545, h3, 50, 350-h3);
    image.fillRect(640, h2, 50, 350-h2);
    image.fillRect(735, h1, 50, 350-h1);
}
