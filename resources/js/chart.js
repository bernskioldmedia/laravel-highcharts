import {
    addLinesToChart,
    addQuadrantsToChart,
    addTextsToChart,
    getChart
} from './chartUtils';

export default () => {
    return {
        extras: [],

        init() {
            this.$nextTick(() => {
                this.extras = this.$wire.get('chartExtras') || {};
                this.initChart();
            });

            this.$wire.$on('updateChartData', ({data, extras}) => {
                const chart = getChart(this.$refs.container.id);

                chart.update(data);

                if (this.extras !== extras) {
                    this.extras = extras;
                    chart.redraw();
                }
            });
        },

        exportChart: {
            ['@export-chart.document'](event) {
                if (this.chart.renderTo.id !== event.detail.chartId) {
                    return;
                }

                this.chart.exportChartLocal({
                    type: event.detail.type,
                });
            },
        },

        initChart() {
            const data = this.$wire.get('chartData') || {};
            const extras = this.extras;

            data.chart = data.chart || {};
            data.chart.events = data.chart.events || {};

            // Add custom drawings.
            data.chart.events.render = function () {
                addTextsToChart(extras.labels || [], this);
                addLinesToChart(extras.lines || [], this);
                addQuadrantsToChart(extras.quadrants || [], this);
            }

            const chart = window.Highcharts.chart(this.$refs.container, data);
            chart.render();
        },
    };
}

