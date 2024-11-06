<script>
import DrawInteraction from '@biigle/ol/interaction/Draw';
import VectorLayer from '@biigle/ol/layer/Vector';
import VectorSource from '@biigle/ol/source/Vector';

/**
 * View model for the detection window tab
 *
 * @type {Object}
 */
export default {
    data() {
        return {
            lasers: 2,
            isSelecting: false,
        };
    },
    computed: {
        layer() {
            return new VectorLayer({
                opacity: 0.5,
                source: new VectorSource(),
                updateWhileAnimating: true,
                updateWhileInteracting: true,
                style: Styles.editing,
            });
        },
        drawInteraction() {
            return new DrawInteraction({
                source: this.layer.getSource(),
                type: 'Rectangle',
                style: this.layer.getStyle(),
                minPoints: 2,
                maxPoints: lasers,
                // geometryFunction(coordinates, opt_geometry) {
                //     if (coordinates.length > 1) {
                //         coordinates = [
                //             coordinates[0],
                //             [coordinates[0][0], coordinates[1][1]],
                //             coordinates[1],
                //             [coordinates[1][0], coordinates[0][1]]
                //         ];
                //     }
                //     let geometry = opt_geometry;
                //     if (geometry) {
                //         geometry.setCoordinates([coordinates]);
                //     } else {
                //         geometry = new Rectangle([coordinates]);
                //     }
                //     return geometry;
                // }
            });
        },
        modifyInteraction() {
            return new ModifyInteraction({
                features: this.layer.getSource().getFeaturesCollection(),
                style: this.layer.getStyle(),
                deleteCondition: neverCondition,
            });
        },
    },
    methods: {
        // Allow user to select laserpoints
        toggleSelecting() {
            this.isSelecting = !this.isSelecting;
            console.log("isSelecting: " + this.isSelecting)
            if (this.isSelecting) {
                this.drawInteraction.setActive(true);
                this.modifyInteraction.setActive(true);
            } else {
                this.drawInteraction.setActive(false);
                this.modifyInteraction.setActive(false);
            }
            this.drawPoint()
        }
    },
    created() {
        this.lasers = 2;
        this.isSelecting = false;
        console.log("number of lasers: " + str(this.lasers))
    },
};
</script>