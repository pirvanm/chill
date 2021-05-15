<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1> Filters</h1>


                <div class="form-group col-md-4">
                    <label for="inputState">#1 Filter Pick a Category</label>
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
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
                    <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                </div>



                <form>
                    <div class="form-group">
                        <label for="formControlRange">Views Range for Clips</label>
                        <input type="range" class="form-control-range" id="formControlRange">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Default checkbox
                        </label>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                <h1>
                    <h1> New Playlist</h1>

                </h1>
            </div>

            <div class="col-md-4">
                    <h1>  List of posible Songs</h1>
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

