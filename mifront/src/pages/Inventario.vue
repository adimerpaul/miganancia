<template>
<q-page class="q-pa-xs">
  <div class="row">
    <div class="col-8">
      <q-input dense outlined label="Buscar producto..." hint="Recuerda ingresar al menos 3 caracteres para iniciar tu búsqueda." counter clearable v-model="filterProducto">
        <template v-slot:prepend>
          <q-icon name="search" />
        </template>
      </q-input>
    </div>
    <div class="col-4 text-center ">
      <q-btn flat  label="Descargar reporte" icon="o_sim_card_download" no-caps />
    </div>
    <div class="col-12 col-sm-6 q-pa-xs">
      <q-card bordered flat>
        <q-item >
          <q-item-section avatar >
            <q-avatar square  icon="view_in_ar" color="grey-1" text-color="grey" size="60px" />
          </q-item-section>
          <q-item-section>
            <q-item-label class="text-subtitle2 text-grey">Total de referencias</q-item-label>
            <q-item-label class="text-h5">{{$store.getters["login/productos"].length}}</q-item-label>
          </q-item-section>
        </q-item>
      </q-card>
    </div>
    <div class="col-12 col-sm-6 q-pa-xs">
      <q-card bordered flat>
        <q-item >
          <q-item-section avatar >
            <q-avatar square  icon="monetization_on" color="green-1" text-color="green" size="60px" />
          </q-item-section>
          <q-item-section>
            <q-item-label class="text-subtitle2 text-grey">Costo total de inventario</q-item-label>
            <q-item-label class="text-h5 text-green">{{costototal}} Bs</q-item-label>
          </q-item-section>
        </q-item>
      </q-card>
    </div>
    <div class="col-12 col-sm-3 q-pa-xs flex flex-center">
      <q-btn class="full-width full-height" label="Editar categorías" icon="o_edit" outline no-caps/>
    </div>
    <div class="col-12 col-sm-3 q-pa-xs flex flex-center">
      <q-select class="full-width full-height text-bold" dense :options="optionsCategorias" v-model="categoria" outlined />
    </div>
    <div class="col-12 col-sm-6 q-pa-xs flex flex-center">
      <q-select
        class="full-width full-height"
        dense
        outlined
        v-model="ordenar"
        :options="optionsOrdernar"
      >
        <template v-slot:selected>
          <span class="text-bold">Ordernar: </span>
          <div
            v-if="ordenar"
            class="q-pl-xs"
          >
<!--            <q-avatar color="primary" text-color="white" :icon="ordenar.icon" />-->
            {{ ordenar.label }}
          </div>
          <q-badge v-else>*none*</q-badge>
        </template>
      </q-select>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-2" v-for="p in $store.getters['login/productos']" :key="p.id">
          <q-card >
            <q-img :src="url+'../imagenes/'+p.foto" width="100%" height="100px">
              <div class="absolute-bottom text-center text-subtitle2">
                {{p.nombre}}
              </div>
            </q-img>
            <q-card-section class="q-pa-none q-ma-none">
              <div class="text-center text-subtitle2">{{ p.precio }} Bs</div>
              <div :class="p.cantidad<=0?'text-center text-bold text-red':' text-center text-bold'">{{ p.cantidad }} {{ $q.screen.lt.md?'Dis':'Disponible' }}</div>
            </q-card-section>

<!--            <q-card-section class="q-pt-none">-->
<!--              ssdsd-->
<!--            </q-card-section>-->
          </q-card>
        </div>
      </div>
    </div>
  </div>
</q-page>
</template>

<script>
export default {
  name: `Inventario`,
  data(){
    return{
      url:process.env.API,
      filterProducto:'',
      categoria:{
        label: 'Ver todas las categorias',
        value: '',
        icon: 'polymer'
      },
      ordenar:{label: 'Productos más vendidos',value: 'Productos más vendidos',icon:'list'},
      optionsOrdernar:[
        {label: 'Productos más vendidos',value: 'Productos más vendidos',icon:'list'},
        {label: 'Alfabéticamente',value: 'Alfabéticamente',icon:'list'},
        {label: 'Productos más rentables',value: 'Productos más rentables',icon:'list'},
        {label: 'Últimas unidades disponibles',value: 'Últimas unidades disponibles',icon:'list'},
      ],
    }
  },
  computed:{
    optionsCategorias(){
      let cat=[{
        label: 'Ver todas las categorias',
        value: '',
        icon: 'polymer'
      }]
      this.$store.getters["login/categorias"].forEach(c=>{
        cat.push({
          label: c.nombre,
          value: c.nombre,
          icon: 'polymer',
          id:c.id
        })
      })
      return cat
    },
    costototal(){
      let ct=0
      this.$store.getters["login/productos"].forEach(p=>{
        ct=ct+ parseFloat(p.precio) * parseFloat(p.cantidad)
      })
      return ct.toFixed(2)
    }
  }
}
</script>

<style scoped>

</style>
