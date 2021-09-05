<template>

    <div class="dashboard-card">

                    <a class="section-add" href="new-todo.html" >
                        <div class="add-container">
                            <div class="card-add">
                                <div type="text" name="coursname" class="field-add"> Ajouter un devoir </div>
                                <button class="icon-plus">
                                    <svg fill="currentColor" width="30" height="30" viewBox="0 0 448 448"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </a>

                    <div class="section-total">
                        <div class="total-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-list-ul" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>
                            <span> 3 </span>
                        </div>
                    </div>

                    <div class="content-separation"></div>


                    <div class=" card-small cards-hover">
                        <a href="detail.html" class="card-link">
                            <div class="">
                                <p class="card-titre" style="margin:0;"><span>28/05</span> | Nom du cou.. </p>
                                <p class="card-soustitre" style="margin-bottom:0;">La tâche : Lorem , ... </p>
                            </div>
                        </a>
                        <div class="card-icons">
                            <div class=" icons-container">
                                <a href="" class="icon-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-app" viewBox="0 0 16 16">
                                        <path
                                            d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class=" card-small cards-hover">
                        <a href="detail.html" class="card-link">
                            <div class="">
                                <p class="card-titre" style="margin:0;"><span>28/05</span> | Nom du cou.. </p>
                                <p class="card-soustitre" style="margin-bottom:0;">La tâche : Lorem , ... </p>
                            </div>
                        </a>
                        <div class="card-icons">
                            <div class=" icons-container">
                                <a href="" class="icon-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-app" viewBox="0 0 16 16">
                                        <path
                                            d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class=" card-small cards-hover">
                        <a href="detail.html" class="card-link">
                            <div class="">
                                <p class="card-titre" style="margin:0;"><span>28/05</span> | Nom du cou.. </p>
                                <p class="card-soustitre" style="margin-bottom:0;">La tâche : Lorem , ... </p>
                            </div>
                        </a>
                        <div class="card-icons">
                            <div class=" icons-container">
                                <a href="" class="icon-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-app" viewBox="0 0 16 16">
                                        <path
                                            d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

</template>

<script>
export default {
  name: 'CardDashboard',
  props: {

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">



</style>
