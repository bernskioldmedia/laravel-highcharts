export default () => {
    return {
        chart: null,
        extras: [],

        init() {
            Alpine.effect(() => {
                this.$nextTick(() => {
                    this.extras = this.$wire.get('chartExtras') || {};
                    this.initChart();
                });
            });

            this.$wire.$on('updateChartData', ({data, extras}) => {
                this.chart.update(data);
                this.chart.resize();

                if (this.extras !== extras) {
                    this.extras = extras;
                    this.chart.redraw();
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

            // Add custom drawings.
            data.chart.events.render = function () {
                let chart = this;

                if (this.extras.labels && this.extras.labels.length > 0) {
                    this.extras.labels.forEach((label) => {
                        addText(
                            chart,
                            label.key,
                            label.label,
                            label.x,
                            label.y,
                            label.styles || {},
                            label.attributes || {}
                        );
                    });
                }

                if (this.extras.lines && this.extras.lines.length > 0) {
                    this.extras.lines.forEach((line) => {
                        addLine(
                            chart,
                            line.key,
                            line.x1,
                            line.y1,
                            line.x2,
                            line.y2,
                            line.attributes || {}
                        );
                    });
                }

                if (this.extras.quadrants && this.extras.quadrants.length > 0) {
                    this.extras.quadrants.forEach((line) => {
                        addQuadrant(
                            chart,
                            line.key,
                            line.x1,
                            line.y1,
                            line.x2,
                            line.y2,
                            line.attributes || {}
                        );
                    });
                }
            }

            if (this.chart) {
                this.chart.update(data);
            } else {
                this.chart = window.Highcharts.chart(this.$refs.container, data);
                this.chart.render();
            }
        }
    };
}

export function addQuadrant(chart, key, x1, y1, x2, y2, attr = {}) {
    maybeDestroyObject(chart, key);

    const x1Pixels = chart.xAxis[0].toPixels(x1, false);
    const y1Pixels = chart.yAxis[0].toPixels(y1, false);
    const x2Pixels = chart.xAxis[0].toPixels(x2, false);
    const y2Pixels = chart.yAxis[0].toPixels(y2, false);

    chart[key] = chart.renderer
        .rect(x1Pixels, y2Pixels, (x2Pixels - x1Pixels), (y1Pixels - y2Pixels), 1)
        .attr({
            ...{
                fill: '#000050',
                opacity: 0.2,
                zIndex: 0
            }, ...attr
        })
        .add();
}

export function addText(chart, key, label, x, y, styles = {}, attr = {}) {
    maybeDestroyObject(chart, key);

    const xPixels = chart.xAxis[0].toPixels(x, false);
    const yPixels = chart.yAxis[0].toPixels(y, false);

    chart[key] = chart.renderer.text(label, xPixels, yPixels)
        .css({
            ...{
                fontWeight: 'bold',
                fontSize: '13px',
                color: '#666666',
                zIndex: 5,
            }, ...styles
        })
        .attr({
            ...{
                align: 'center'
            },
            ...attr
        })
        .add();
}

export function addLine(chart, key, x1, y1, x2, y2, attr = {}) {
    maybeDestroyObject(chart, key);

    const x1Pixels = chart.xAxis[0].toPixels(x1, false);
    const y1Pixels = chart.yAxis[0].toPixels(y1, false);
    const x2Pixels = chart.xAxis[0].toPixels(x2, false);
    const y2Pixels = chart.yAxis[0].toPixels(y2, false);

    chart[key] = chart.renderer
        .path(['M', x1Pixels, y1Pixels, 'L', x2Pixels, y2Pixels])
        .attr({
            ...{
                'stroke-width': 1,
                stroke: '#eee',
                zIndex: 2
            }, ...attr
        })
        .add();
}

export function maybeDestroyObject(chart, key) {
    if (chart[key]) {
        chart[key].destroy();
    }
}
