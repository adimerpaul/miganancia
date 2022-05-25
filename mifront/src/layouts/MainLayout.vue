<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="text-black bg-white">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title class="text-bold">
          Mi Ganancia.com
        </q-toolbar-title>

<!--        <div>Quasar v{{ $q.version }}</div>-->
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <div  class="full-height">
        <q-list  class="full-width">
          <q-item clickable v-ripple>
            <!--          <q-item-section >-->
            <!--            <img src="https://cdn.quasar.dev/img/mountains.jpg">-->
            <q-img src="/logo.png" spinner-color="white" style="height: 28px; max-width: 30px" />
            <!--          </q-item-section>-->
            <q-item-section class="text-center text-bold">Mi Ganancia.com</q-item-section>
          </q-item>
          <q-item class="">
            <q-item-section>
              <div > <b>Bienvenido: </b> {{$store.getters["login/user"].name}}
<!--                <pre>{{ $store.getters["login/negocios"] }}</pre>-->
              </div>
            </q-item-section>
          </q-item>
          <q-item class="q-pt-none">
            <q-item-section>
            <q-card class="q-pa-none bg-grey-3"  v-for="n in $store.getters['login/negocios'] " :key="n.id">
<!--              <q-card-section class="q-pa-none q-ma-none">Bienvenido:</q-card-section>-->
              <q-card-section horizontal>
                <q-card-section >
                  <q-img :src="url+'../imagenes/'+n.foto" class="q-pa-lg" style="border:0px solid black;height: 50px; max-width: 50px;border-radius: 25px"/>
                </q-card-section>
                <q-card-section>
                  <q-item-label>{{n.nombre}}</q-item-label>
                  <q-item-label caption>{{n.tipo}}</q-item-label>
                </q-card-section>
              </q-card-section>
              <q-separator/>
              <q-card-section class="q-pa-xs">
                <div class="flex flex-center" @click="clickUpdateNegocio(n)"> <q-icon name="edit" class="q-pr-xs" /> <div class="text-bold"> Editar negocio</div></div>
                <div class="flex flex-center"> <q-icon name="add_circle" class="q-pr-xs" />  <div class="text-bold"> Agregar otro negocio</div></div>
              </q-card-section>
            </q-card>
            </q-item-section>
          </q-item>
          <!--        <q-item-label-->
          <!--          header-->
          <!--        >-->
          <!--          <q-img src="/logo.png" spinner-color="white" style="height: 28px; max-width: 30px" />-->
          <!--&lt;!&ndash;          <div class="text-">Mi Ganancia.com</div>&ndash;&gt;-->
          <!--        </q-item-label>-->

          <!--        <EssentialLink-->
          <!--          v-for="link in essentialLinks"-->
          <!--          :key="link.title"-->
          <!--          v-bind="link"-->
          <!--        />-->

        </q-list>
        <div style="position: absolute;bottom: 0px" class="full-width">
          <q-list  >
            <q-item class="full-width text-grey" clickable v-if="$store.getters['login/isLoggedIn']">
              <q-item-section avatar>
                <q-icon name="help_outline" />
              </q-item-section>
              <q-item-section>
                <q-item-label>¿Necesitas contactar a soporte? ¡Hazlo aquí!</q-item-label>
                <!--            <q-item-label caption>{{ caption }}</q-item-label>-->
              </q-item-section>
            </q-item>
            <q-item class="full-width text-grey" clickable v-if="$store.getters['login/isLoggedIn']">
              <q-item-section avatar>
                <q-icon name="subject" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Términos y condiciones y Política de privacidad</q-item-label>
                <!--            <q-item-label caption>{{ caption }}</q-item-label>-->
              </q-item-section>
            </q-item>
            <q-item class="full-width text-red" clickable @click="logout" v-if="$store.getters['login/isLoggedIn']">
              <q-item-section avatar>
                <q-icon name="logout" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Cerrar sesión</q-item-label>
                <!--            <q-item-label caption>{{ caption }}</q-item-label>-->
              </q-item-section>
            </q-item>
          </q-list>
        </div>
<!--        <q-list  class="full-width" style="border: 1px solid black">-->
<!--          <q-item clickable v-ripple>-->
<!--            &lt;!&ndash;          <q-item-section >&ndash;&gt;-->
<!--            &lt;!&ndash;            <img src="https://cdn.quasar.dev/img/mountains.jpg">&ndash;&gt;-->
<!--            <q-img src="/logo.png" spinner-color="white" style="height: 28px; max-width: 30px" />-->
<!--            &lt;!&ndash;          </q-item-section>&ndash;&gt;-->
<!--            <q-item-section class="text-center text-bold">Mi Ganancia.com</q-item-section>-->
<!--          </q-item>-->
<!--          &lt;!&ndash;        <q-item-label&ndash;&gt;-->
<!--          &lt;!&ndash;          header&ndash;&gt;-->
<!--          &lt;!&ndash;        >&ndash;&gt;-->
<!--          &lt;!&ndash;          <q-img src="/logo.png" spinner-color="white" style="height: 28px; max-width: 30px" />&ndash;&gt;-->
<!--          &lt;!&ndash;&lt;!&ndash;          <div class="text-">Mi Ganancia.com</div>&ndash;&gt;&ndash;&gt;-->
<!--          &lt;!&ndash;        </q-item-label>&ndash;&gt;-->

<!--          &lt;!&ndash;        <EssentialLink&ndash;&gt;-->
<!--          &lt;!&ndash;          v-for="link in essentialLinks"&ndash;&gt;-->
<!--          &lt;!&ndash;          :key="link.title"&ndash;&gt;-->
<!--          &lt;!&ndash;          v-bind="link"&ndash;&gt;-->
<!--          &lt;!&ndash;        />&ndash;&gt;-->

<!--        </q-list>-->

      </div>

    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
    <q-dialog v-model="dialognegocio" position="right" full-height :maximized="true">
      <q-card style="width: 450px; max-width: 80vw;">
<!--        <q-linear-progress :value="0.6" color="pink" />-->
        <q-card-section class="row items-center no-wrap">
          <q-form @submit.prevent="updateNegocio">
            <div class="row">
              <div class="col-12">
                <div class="text-h6">Crear un nuevo negocio</div>
                <div class="text-caption text-grey">Los campos marcados con asterisco (<span class="text-red">*</span>) son obligatorios</div>
              </div>
              <div class="col-12">
                <!--                    color="purple-12"-->
                <!--                    <q-input outlined type="email" v-model="user.email" label="Email*" hint="Porfavor ingresar email" :rules="rule" required>-->
                <!--                      <template v-slot:prepend>-->
                <!--                        <q-icon name="email" />-->
                <!--                      </template>-->
                <!--                    </q-input>-->
                <q-select
                  dense
                  outlined
                  hint="Seleccionar una categoria"
                  v-model="negocio.tipos"
                  :options="options"
                  label="Tipo de negocio *"
                >
                  <template v-slot:option="scope">
                    <q-item v-bind="scope.itemProps">
                      <q-item-section avatar>
                        <q-icon :name="scope.opt.icon" />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label>{{ scope.opt.label }}</q-item-label>
                        <q-item-label caption>{{ scope.opt.description }}</q-item-label>
                      </q-item-section>
                    </q-item>
                  </template>
                  <template v-slot:prepend>
                    <q-icon name="precision_manufacturing"/>
                  </template>
                </q-select>
              </div>
              <div class="col-12 ">
                <q-input dense outlined v-model="negocio.nombre" label="Nombre del negocio*" hint="Porfavor ingresar nombre de la empresa" :rules="rule" required>
                  <template v-slot:prepend>
                    <q-icon name="factory" />
                  </template>
                </q-input>
              </div>
              <div class="col-12 ">
                <q-input dense outlined v-model="negocio.direccion" label="Dirección del negocio" hint="Porfavor ingresar direccion" >
                  <template v-slot:prepend>
                    <q-icon name="share_location" />
                  </template>
                </q-input>
              </div>
              <div class="col-12 ">
                <q-input dense outlined v-model="negocio.ciudad" label="Ciudad donde se ubica el negocio" hint="Porfavor ingresar ciudad" >
                  <template v-slot:prepend>
                    <q-icon name="location_city" />
                  </template>
                </q-input>
              </div>
<!--              <div class="col-12 ">-->
<!--                <q-input dense outlined type="email" v-model="user.email" label="Email*" hint="Porfavor ingresar email" :rules="rule" required>-->
<!--                  <template v-slot:prepend>-->
<!--                    <q-icon name="email" />-->
<!--                  </template>-->
<!--                </q-input>-->
<!--              </div>-->

              <!--                  <div class="col-12 ">-->
              <!--                    <q-input dense outlined v-model="user.carnet" label="Carnet o NIT*" hint="Porfavor ingresar carnet o nit" :rules="rule">-->
              <!--                      <template v-slot:prepend>-->
              <!--                        <q-icon name="credit_card" />-->
              <!--                      </template>-->
              <!--                    </q-input>-->
              <!--                  </div>-->
<!--              <div class="col-12 ">-->
<!--                <q-input dense outlined v-model="user.name" label="Nombre completo*" hint="Porfavor ingresar nombre completo" :rules="rule">-->
<!--                  <template v-slot:prepend>-->
<!--                    <q-icon name="people" />-->
<!--                  </template>-->
<!--                </q-input>-->
<!--              </div>-->
<!--              <div class="col-12 ">-->
<!--                <q-input dense outlined v-model="user.password" label="password*" :type="isPwd ? 'password' : 'text'" hint="Porfavor ingresar carnet de identidad" :rules="rule">-->
<!--                  <template v-slot:prepend>-->
<!--                    <q-icon name="lock" />-->
<!--                  </template>-->
<!--                  <template v-slot:append>-->
<!--                    <q-icon-->
<!--                      :name="isPwd ? 'visibility_off' : 'visibility'"-->
<!--                      class="cursor-pointer"-->
<!--                      @click="isPwd = !isPwd"-->
<!--                    />-->
<!--                  </template>-->
<!--                </q-input>-->
<!--              </div>-->
              <!--                  <div class="col-12 ">-->
              <!--                    <q-select use-input @filter="filterFn" dense outlined v-model="user.unit" label="Unidad*" :options="units" option-label="nombre"  hint="Porfavor ingresar unidad"  >-->
              <!--                      <template v-slot:prepend>-->
              <!--                        <q-icon name="home" />-->
              <!--                      </template>-->
              <!--                    </q-select>-->
              <!--                  </div>-->
              <!--                  <div class="col-12">-->
              <!--                    <q-input dense outlined v-model="user.direccion" label="Direccion*" hint="Direccion de donde vives" :rules="rule">-->
              <!--                      <template v-slot:prepend>-->
              <!--                        <q-icon name="home" />-->
              <!--                      </template>-->
              <!--                    </q-input>-->
              <!--                  </div>-->
              <div class="col-12 text-center flex flex-center">
                <q-uploader
                  accept=".jpg, .png"
                  @added="uploadFile"
                  auto-upload
                  max-files="1"
                  label="Ingresar el logo de su empresa"
                  flat
                  bordered
                />
              </div>
              <div class="col-12">
                <div class="text-caption text-grey">Te recomendamos que la imagen tenga un tamaño de 500 x 500 px en formato PNG y pese máximo 2MB.</div>
              </div>
              <div class="col-12 q-py-md">

                <q-btn label="Guardar cambios" color="warning"  class=" text-build text-black full-width" type="submit"/>
<!--                <q-btn label="Ingresa" color="secondary" icon="how_to_reg" @click="tab='login'" class="full-width q-mt-xs" />-->
<!--                <div class="text-caption q-py-xs">-->
<!--                  <a target="_blank" href="https://api.whatsapp.com/send?phone=59169603027&text=olvide mi contraseña gamo">Olvidate tu contraseña?</a>-->
<!--                </div>-->
              </div>
            </div>
          </q-form>
<!--          <div>-->
<!--            <div class="text-weight-bold">The Walker</div>-->
<!--            <div class="text-grey">Fitz & The Tantrums</div>-->
<!--          </div>-->
<!--          <q-space />-->
<!--          <q-btn flat round icon="fast_rewind" />-->
<!--          <q-btn flat round icon="pause" />-->
<!--          <q-btn flat round icon="fast_forward" />-->
        </q-card-section>
      </q-card>
    </q-dialog>
  </q-layout>
</template>

<script>
export  default({
  data(){
    return{
      negocio:{},
      rule:[
        val => (val && val.length > 0) || 'Porfavor ingresar dato'
      ],
      isPwd:true,
      dialognegocio:false,
      user:{},
      model:'',
      foto:' ',
      options: [
        {
          label: 'Supermercado o tienda de conveniencia',
          value: 'Supermercado o tienda de conveniencia',
          description: 'Establecimiento comercial que venden una variedad de artículos cotidianos',
          icon: 'shopping_cart'
        },
        {
          label: 'Industria o manufactura',
          value: 'Industria o manufactura',
          description: 'Tiendas de conveniencia a los establecimientos comerciales que venden una variedad de artículos',
          icon: 'factory'
        },
        {
          label: 'Servicios de transporte y logística',
          value: 'Servicios de transporte y logística',
          description: 'Movilizar la mercancía a lo largo de la cadena de suministro',
          icon: 'polymer'
        },
      ],
      url:process.env.API,
      leftDrawerOpen:false,
    }
  },
  methods:{
    async clickUpdateNegocio(n) {
      this.negocio = n;
      let ne = await this.options.find(r => r.label === n.tipo)
      console.log(n.tipo)
      this.negocio.tipos = ne
      this.dialognegocio = true
    },
    uploadFile (file) {
      // console.log(file)
      // function showDefault () {
      let dialog = this.$q.dialog({
        message: 'Subiendo... 0%',
        progress: true, // we enable default settings
        persistent: true, // we want the user to not be able to close it
        ok: false // we want the user to not be able to close it
      })

      // we simulate some progress here...
      let percentage = 0
      // const interval = setInterval(() => {
      //   percentage = Math.min(100, percentage + Math.floor(Math.random() * 22))
      //
      //   // we update the dialog
      //   dialog.update({
      //     message: `Subiendo... ${percentage}%`
      //   })
      //
      //   // if we are done, we're gonna close it
      //   if (percentage === 100) {
      //     clearInterval(interval)
      //     setTimeout(() => {
      //       dialog.hide()
      //     }, 350)
      //   }
      // }, 500)
      // }
      const fd = new FormData()
      fd.append('file', file[0])
      // updateProgress(0)
      return new Promise((resolve, reject) => {
        this.$api.post('upload',
          fd,
          {
            headers: { 'Content-Type': 'multipart/form-data' },
            onUploadProgress: (progressEvent) => {
              // console.log(Math.round((progressEvent.loaded / progressEvent.total) * 100) / 100)
              percentage = Math.round((progressEvent.loaded / progressEvent.total) * 100)

              dialog.update({
                message: `Subiendo... ${percentage}%`
              })
              if (percentage>=100){
                dialog.hide()
              }
              // updateProgress(Math.round((progressEvent.loaded / progressEvent.total) * 100) / 100)
            }
          })
          .then(res => {
            // console.log(res.data)
            this.foto=res.data
            resolve(file)
          })
          .catch(err => reject(err))
      })
    },
    updateNegocio(){

    },
    logout(){
      this.$q.dialog({
        message:'¿Quieres cerrar sesión?',
        title:"Salir",
        ok:{
          push:true
        },
        cancel:{
          push:true,
          color:'negative'
        }
      }).onOk(()=>{
        this.$q.loading.show()
        this.$store.dispatch('login/logout')
          .then(() => {
            this.$q.loading.hide()
            this.$router.push('/')
          })
      })

    },
    toggleLeftDrawer() {
      this.leftDrawerOpen= !this.leftDrawerOpen
    }
  }
})
</script>
