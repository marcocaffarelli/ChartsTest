<template>
    <div class="container">
            <div v-for="(message,index) in messages" style="width: 400px; height: 400px; display:inline-block">
                <canvas id="myChart" width="400" height="400"></canvas>
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
                    if (abcd == 'Jan-2021') {
                        this.gennaio.push(abcd);
                    }
                    else if (abcd == 'Feb-2021') {
                        this.febbraio.push(abcd);
                    }
                     else if (abcd == 'Mar-2021') {
                        this.marzo.push(abcd);
                    }
                     else if (abcd == 'Apr-2021') {
                        this.aprile.push(abcd);
                    }
                     else if (abcd == 'May-2021') {
                        this.maggio.push(abcd);
                    }
                     else if (abcd == 'Jun-2021') {
                        this.giugno.push(abcd);
                    }
                     else if (abcd == 'Jul-2021') {
                        this.luglio.push(abcd);
                    }
                     else if (abcd == 'Aug-2021') {
                        this.agosto.push(abcd);
                    }
                     else if (abcd == 'Sep-2021') {
                        this.settembre.push(abcd);
                    }
                     else if (abcd == 'Oct-2021') {
                        this.ottobre.push(abcd);
                    }
                     else if (abcd == 'Nov-2021') {
                        this.novembre.push(abcd);
                    }
                     else if (abcd == 'Dec-2021') {
                        this.dicembre.push(abcd);
                    }
                    //console.log(abcd);
                    
                });
            }).catch(error => {
                console.log(error);
            });
            console.log(this.marzo);
        },

        updated() {
            
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: 'Messaggi ricevuti',
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
