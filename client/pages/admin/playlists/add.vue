<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center border pr-2 mr-2">
                <h1> Filters</h1>


                <div class="form-group col-md-4 pr-2 mr-2">
                    <h1 for="inputState">#1 Filter Pick a Category</h1>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <label for="inputState">#2 Pick Duration</label>
                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>



                <form>
                    <div class="form-group">
                        <label for="inputState">#3 Chouse Number of Views</label>

                        <input type="range" class="form-control-range" id="formControlRange">
                    </div>


                    <div class="form-group">
                        <label for="inputState">#4 Type a Title</label>

                        <input type="text" class="form-control" id="title">
                    </div>


                    <div class="form-group">
                        <label for="inputState">#5 Type a Tagg</label>

                        <input type="text" class="form-control" id="tagg">
                    </div>



                </form>
            </div>

            <div class="col-md-4 border pr-2">
                <h1>
                    <h1> New Playlist  / count(total video)</h1>

                </h1>
            </div>

            <div class="col-md-4 border ml-2">
                    <h1>  List of posible Songs / count(total)</h1>
            </div>
        </div>
    </div>
</template>


<script>

</script>
<style scoped>
.container{
    margin-top:50px;
}
</style>

