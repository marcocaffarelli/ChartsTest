<template>
    <div class="container">
            <div v-if="messages" style="width: 400px; height: 400px; display:inline-block">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div v-if="messages" style="width: 400px; height: 400px; display:inline-block">
                <canvas id="myChart2" width="400" height="400"></canvas>
            </div>
    </div>
</template>

<script>
    export default {
         data(){
            return {
                messages: "",
                gennaio:[],
                febbraio:[],
                marzo:[],
                aprile:[],
                maggio:[],
                giugno:[],
                luglio:[],
                agosto:[],
                settembre:[],
                ottobre:[],
                novembre:[],
                dicembre:[],
                primoAnno:[],
                secondoAnno:[],
                terzoAnno:[],
                quartoAnno:[],
                quintoAnno:[],
                
            }
        },
        mounted(){
            console.log('Component mounted.')
            axios.get('api/messages').then(response => {
                //console.log(response.data.data);
                this.messages = response.data.data;
                //console.log(this.messages)

                this.messages.forEach(element => {
                    let abcd = element.created_at;
                    // var prova=[];
                    var d1 = new Date('2021-01-01');
                    var d2 = new Date('2021-05-23');
                    // var same = d1.getFullYear() === d2.getFullYear();
                    // var notSame = d1.getFullYear() !== d2.getFullYear();
                    var incremento = 0;
                    // console.log('d1 < d2', d1 < d2); // false
                    // console.log('d1 > d2', d1 > d2); // false
                    // console.log('d1 === d2', d1 === d2); // false, oops!
                    var tody = 'DEC 31 2021 23:59:59';

                    var today = new Date();
                    var prova = new Date('December 25, 2023 23:15:00');
                    //console.log(prova.getFullYear());
                    //console.log(today);
                    
                    while (today.getFullYear() == (d1.getFullYear() + incremento)) {
                        if (today != 'DEC 31' + today.getFullYear() + '23:59:59') {
                            if (abcd == 'Jan-'+ today.getFullYear()) {
                                this.gennaio.push(abcd);
                            }
                            else if (abcd == 'Feb-'+ today.getFullYear()) {
                                this.febbraio.push(abcd);
                            }
                            else if (abcd == 'Mar-'+ today.getFullYear()) {
                                this.marzo.push(abcd);
                            }
                            else if (abcd == 'Apr-'+ today.getFullYear()) {
                                this.aprile.push(abcd);
                            }
                            else if (abcd == 'May-'+ today.getFullYear()) {
                                this.maggio.push(abcd);
                            }
                            else if (abcd == 'Jun-'+ today.getFullYear()) {
                                this.giugno.push(abcd);
                            }
                            else if (abcd == 'Jul-'+ today.getFullYear()) {
                                this.luglio.push(abcd);
                            }
                            else if (abcd == 'Aug-'+ today.getFullYear()) {
                                this.agosto.push(abcd);
                            }
                            else if (abcd == 'Sep-'+ today.getFullYear()) {
                                this.settembre.push(abcd);
                            }
                            else if (abcd == 'Oct-'+ today.getFullYear()) {
                                this.ottobre.push(abcd);
                            }
                            else if (abcd == 'Nov-'+ today.getFullYear()) {
                                this.novembre.push(abcd);
                            }
                            else if (abcd == 'Dec-'+ today.getFullYear()) {
                                this.dicembre.push(abcd);
                            }
                        }
                        else if (today == 'DEC 31 2021 23:59:59'){
                            this.gennaio = [];
                            this.febbraio = [];
                            this.marzo = [];
                            this.aprile = [];
                            this.maggio = [];
                            this.giugno = [];
                            this.luglio = [];
                            this.agosto = [];
                            this.settembre = [];
                            this.ottobre = [];
                            this.novembre = [];
                            this.dicembre = [];
                            
                        }
                        if (abcd.includes(2021)) {
                                this.primoAnno.push(abcd);
                            }
                            else if (abcd.includes(2022)) {
                                this.secondoAnno.push(abcd);
                            }
                            else if (abcd.includes(2023)) {
                                this.terzoAnno.push(abcd);
                            }
                            else if (abcd.includes(2024)) {
                                this.quartoAnno.push(abcd);
                            }
                            else if (abcd.includes(2025)) {
                                this.quintoAnno.push(abcd);
                            }
                        
                        incremento++;
                    }
                    
                    //console.log(abcd);
                    
                });
            }).catch(error => {
                console.log(error);
            });
            //console.log(this.marzo);
        },

        updated() {
            
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: 'Messaggi ricevuti per mese',
                        data: [this.gennaio.length, this.febbraio.length, this.marzo.length, this.aprile.length, this.maggio.length, this.giugno.length, this.luglio.length, this.agosto.length, this.settembre.length, this.ottobre.length, this.novembre.length, this.dicembre.length],
                        
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 4
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx = document.getElementById('myChart2');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [2021, 2022, 2023, 2024, 2025],
                    datasets: [{
                        label: 'Messaggi ricevuti per anno',
                        data: [this.primoAnno.length, this.secondoAnno.length, this.terzoAnno.length, this.quartoAnno.length, this.quintoAnno.length],
                        
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 4
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
//             let self = this;
//             function ciao(){
//             chart.data.datasets[0].data = self.messages;

//             chart.update();
//             }
//             ciao();
// // questa funzione fa l'update del data, ad ogni refresh


        }
    }
</script>
