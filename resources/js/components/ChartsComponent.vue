<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="(message,index) in messages">
                        <div>
                            {{message.nome_paziente}}
                        </div>
                        <div>
                            {{message.created_at}}
                        </div>
                </div>
            </div>
        </div>
           <div class="container">
            <div style="width: 400px; height: 400px; display:inline-block">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         data(){
            return {
                messages: "",
                // messagese:[32, 3, 6,7],
                prova:[],  
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/message').then(response => {
                console.log(response.data.response);
                this.messages = response.data.response;
                //console.log(this.messages);
                let bdcs = this.messages[0].created_at;
                //console.log(bdcs.slice(0, 7));
                //console.log(bdcs);
                // this.messages.forEach(element => {
                //     let abcd = element.created_at;
                //     abcd.slice(0, 4);
                //     this.prova.push(abcd);
                // });
                    console.log(this.prova); 
            }).catch(error => {
                console.log(error);
            });
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Messaggi ricevuti',
                        data: [34, 19, 3, 5, 2, 3],
                        backgroundColor: [
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
//             chart.data.datasets[0].data = self.messagese;

//             chart.update();
//             }
//             ciao();
// // questa funzione fa l'update del data, ad ogni refresh


        }
    }
</script>
