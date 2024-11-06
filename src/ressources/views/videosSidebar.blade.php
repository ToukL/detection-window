@can('edit-in', $volume)
    <sidebar-tab name="detection-window" icon="vector-square" title="Set detection window for video">
        <detection-window-tab inline-template>
            <form class="form-stacked">
                <h4 title="Set a detection window for video annotations">Video Detection Window</h4>
                <div class="form-group">
                    <label for="lasers">Number of lasers</label>
                    <input v-model="lasers" id="lasers" type="number" min="2" max="4" step="1" title="Number of lasers used" class="form-control" required>
                </div>
                    <button class="btn btn-default" title="Select the laser points used to set detection window" v-on:click="toggleSelecting" :class="{active:isSelecting}"><span class="fa fa-pencil-alt" aria-hidden="true"></span> Edit</button>
            </form>
        </detection-window-tab>
    </sidebar-tab>
@endcan
