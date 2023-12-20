export function getChart(chartId) {
    return window.Highcharts.charts.find(chart => chart.renderTo.id === chartId);
}

export function addQuadrantsToChart(quadrants, chart) {
    if (quadrants.length < 1) {
        return;
    }

    quadrants.forEach(quadrant => {
        addQuadrant(chart, quadrant.key, quadrant.x1, quadrant.y1, quadrant.x2, quadrant.y2, quadrant.attr);
    });
}

export function addLinesToChart(lines, chart) {
    if (lines.length < 1) {
        return;
    }

    lines.forEach(line => {
        addLine(chart, line.key, line.x1, line.y1, line.x2, line.y2, line.attr);
    });
}

export function addTextsToChart(texts, chart) {
    if (texts.length < 1) {
        return;
    }

    texts.forEach(text => {
        addText(chart, text.key, text.label, text.x, text.y, text.styles, text.attr);
    });
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
