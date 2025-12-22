<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <card-component titulo="Lista de pedidos">
                    <template v-slot:header>
                        <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#modalSale">Adicionar</button>
                    </template>
                    <template v-slot:content>
                        <table-component></table-component>
                    </template>

                    <template v-slot:footer>
                        
                    </template>
                </card-component>
            </div>
        </div>
        <modal-component id="modalSale" titulo="Cadatrar Pedido">

            <template v-slot:content>
                <div class="form-group mb-3">
                    <input-component titulo="Vendedor" id="selectSeller" id-help="newSeller" help-text="Selecione o vendedor">
                        <input type="text" class="form-control" id="selectSeller" aria-describedby="newSeller" placeholder="Selecione o vendedor" v-model="seller_id">
                    </input-component>
                </div>

                <div class="form-group">
                    <input-component titulo="Valor do pedido" id="valueSale" id-help="newSale" help-text="Insira um valor">
                        <input type="number" class="form-control" id="valueSale" aria-describedby="newSale" placeholder="999.99" v-model="sale_price">
                    </input-component>
                </div>
            </template>

            <template v-slot:footer>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="createSale($event)">Criar pedido</button>
            </template>
            
            
        </modal-component>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                urlBase: 'http://localhost:8000/api/v1/sale',
                seller_id: '',
                sale_price: ''
            }
        },

        methods: {
            createSale()
            {

                const getCookie = (name) => {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            const token = getCookie('token');

                let body = {
                    'seller_id': this.seller_id,
                    'sale_price': this.sale_price
                }
                
                let config ={   
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer'+token
                    },
                }

                axios.post(this.urlBase, body, config )
                    .then(response => {
                        console.log(response)
                    })
                    .catch(errors => {
                        console.log(errors)
                    })


                // let url = 'http://localhost:8000/api/v1/sale'
                // let config = {
                //     method: 'post',
                //     body: new URLSearchParams({
                //         'seller_id': this.seller_id,
                //         'sale_price': this.sale_price
                //     })
                // }

                // fetch(url, config)
                //     .then(response => response.json())
                //     .then(data => {
                //         if(!data.sale){
                //             throw new Error('Erro na rede');
                //         }

                //         windows.re
                //     })

            }
        }
    }
</script>
