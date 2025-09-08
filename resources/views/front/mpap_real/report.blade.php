<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Report – Template</title>
  <style>
    :root{
      --bg:#f6f7f9;
      --paper:#ffffff;
      --ink:#0f172a;
      --sub:#475569;
      --muted:#94a3b8;
      --line:#e2e8f0;
      --accent:#2563eb;
      --good:#16a34a;
      --warn:#ea580c;
      --bad:#dc2626;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      background:var(--bg);
      color:var(--ink);
      font:14px/1.5 system-ui,-apple-system,Segoe UI,Roboto,Inter,Arial,Helvetica,sans-serif;
    }

    /* Layout */
    .container{max-width:1000px;margin:24px auto;padding:0 16px}
    .report{background:var(--paper);border:1px solid var(--line);border-radius:16px;overflow:hidden;box-shadow:0 10px 20px rgba(2,6,23,.06)}

    /* Header */
    .header{display:flex;gap:16px;align-items:center;padding:20px 24px;border-bottom:1px solid var(--line);background:linear-gradient(180deg,#fff,#fafafa)}
    .logo{width:52px;height:52px;border-radius:10px;background:#e5edff;display:grid;place-items:center;font-weight:700;color:var(--accent)}
    .h-text{flex:1}
    .title{margin:0;font-size:20px}
    .subtitle{margin:2px 0 0;color:var(--sub);font-size:13px}
    .meta{font-size:12px;color:var(--sub)}

    /* Summary */
    .grid{display:grid;gap:12px}
    .grid.cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}
    .grid.cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}
    @media (max-width:900px){.grid.cols-4{grid-template-columns:repeat(2,1fr)}}
    @media (max-width:520px){.grid.cols-4,.grid.cols-2{grid-template-columns:1fr}}

    .card{background:#fff;border:1px solid var(--line);border-radius:12px;padding:14px}
    .kpi-title{font-size:12px;color:var(--sub);margin:0 0 8px}
    .kpi-value{font-size:22px;font-weight:700;margin:0}
    .kpi-delta{font-size:12px}
    .delta-up{color:var(--good)}
    .delta-flat{color:var(--sub)}
    .delta-down{color:var(--bad)}

    /* Sections */
    .section{padding:16px 24px}
    .section + .section{border-top:1px solid var(--line)}
    .section h3{margin:0 0 10px;font-size:16px}
    .muted{color:var(--sub)}

    /* Table */
    .table-wrap{overflow:auto;border:1px solid var(--line);border-radius:10px}
    table{width:100%;border-collapse:separate;border-spacing:0;background:#fff}
    thead th{position:sticky;top:0;background:#f9fafb;font-weight:600;font-size:12px;color:var(--sub);text-align:left;border-bottom:1px solid var(--line);padding:10px}
    tbody td{padding:10px;border-bottom:1px solid var(--line);font-size:13px}
    tbody tr:nth-child(even) td{background:#fcfdff}
    .right{text-align:right}
    .center{text-align:center}
    .status{font-size:11px;padding:4px 8px;border-radius:999px;border:1px solid var(--line);display:inline-block}
    .status.ok{background:#ecfdf5;color:#065f46;border-color:#bbf7d0}
    .status.warn{background:#fff7ed;color:#9a3412;border-color:#fed7aa}
    .status.err{background:#fef2f2;color:#991b1b;border-color:#fecaca}

    /* Notes */
    .notes{display:grid;gap:8px}
    .note{border-left:3px solid var(--accent);background:#f8fafc;padding:10px;border-radius:8px}

    /* Footer */
    .footer{display:flex;gap:12px;justify-content:space-between;align-items:flex-end;padding:14px 24px;color:var(--muted);font-size:12px}
    .sign{border-top:1px solid var(--line);padding-top:8px;margin-top:24px}

    /* Page breaks for print */
    .page-break{break-after:page}

    /* Print styles */
    @media print{
      body{background:#fff}
      .container{max-width:unset;margin:0;padding:0}
      .report{border:none;border-radius:0;box-shadow:none}
      .header{background:#fff}
      .table-wrap{border:none}
      a[href]::after{content:" (" attr(href) ")";font-size:10px;color:#666}
      .no-print{display:none !important}
      @page{size:A4;margin:14mm}
    }
  </style>
</head>
<body>
  <div class="container">
    <article class="report" role="document">
      <!-- Header -->
      <header class="header">
        <div class="logo" aria-label="Organization logo">DR</div>
        <div class="h-text">
          <h1 class="title">Data Report</h1>
          <p class="subtitle">Organization Name • Reporting period: Apr 1 to Jun 30, 2025</p>
        </div>
        <div class="meta">
          <div>Prepared by: Data Team</div>
          <div>Date: Jul 10, 2025</div>
        </div>
      </header>

      <!-- KPIs -->
      <section class="section">
        <h3>Summary</h3>
        <div class="grid cols-4">
          <div class="card">
            <p class="kpi-title">Total Projects</p>
            <p class="kpi-value">128</p>
            <p class="kpi-delta delta-up">+12 vs last quarter</p>
          </div>
          <div class="card">
            <p class="kpi-title">On-Going</p>
            <p class="kpi-value">₱ 86.2M</p>
            <p class="kpi-delta delta-down">−4.3% vs plan</p>
          </div>
          <div class="card">
            <p class="kpi-title">On-time Delivery</p>
            <p class="kpi-value">92%</p>
            <p class="kpi-delta delta-up">+3 pp</p>
          </div>
          <div class="card">
            <p class="kpi-title">Beneficiaries</p>
            <p class="kpi-value">41,230</p>
            <p class="kpi-delta delta-flat">no change</p>
          </div>
        </div>
      </section>

      <!-- Data table -->
      <section class="section">
        <h3>Projects</h3>
        <div class="table-wrap" role="region" aria-label="Projects table">
          <table>
            <thead>
              <tr>
                <th style="width:26%">Project</th>
                <th>Province</th>
                <th>Sector</th>
                <th class="right">Budget ($)</th>
                <th class="center">Status</th>
                <!-- <th class="right">Progress</th> -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Farm-to-Market Road</td>
                <td>Agusan del Sur</td>
                <td>Infrastructure</td>
                <td class="right">12,500,000</td>
                <td class="center"><span class="status ok">On track</span></td>
                <!-- <td class="right">78%</td> -->
              </tr>
              <tr>
                <td>Digital Skills Training</td>
                <td>Davao del Norte</td>
                <td>Capacity Building</td>
                <td class="right">3,200,000</td>
                <td class="center"><span class="status warn">Delay risk</span></td>
                <!-- <td class="right">54%</td> -->
              </tr>
              <tr>
                <td>Irrigation Rehab</td>
                <td>North Cotabato</td>
                <td>Agriculture</td>
                <td class="right">8,900,000</td>
                <td class="center"><span class="status err">On hold</span></td>
                <!-- <td class="right">12%</td> -->
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Narrative / Insights -->
      <section class="section">
        <h3>Highlights</h3>
        <div class="notes">
          <div class="note">On-time delivery improved by 3 percentage points after vendor alignment in May.</div>
          <div class="note">Spending trailed plan due to two deferred infrastructure items in Region 12.</div>
          <div class="note">Training completion rate held steady, demand in Davao region stayed high.</div>
        </div>
      </section>

      <!-- Appendix -->
      <section class="section page-break">
        <h3>Appendix A. Methodology</h3>
        <p class="muted">Data source: MIS v2, extraction date Jul 5, 2025. Values rounded to nearest whole number. Currency in Philippine peso.</p>
      </section>

      <!-- Footer / Sign-off -->
      <footer class="footer">
        <div>
          <div class="sign">Prepared by: _________________________</div>
          <div class="sign">Reviewed by: _________________________</div>
        </div>
        <div>Page 1 of 1</div>
      </footer>
    </article>
  </div>

  <!-- How to use:
    - Replace header text, dates, and KPIs.
    - Duplicate rows in the table for more records.
    - Use .page-break on sections that should start on a new printed page.
    - Adjust --accent in :root to match your brand.
  -->
</body>
</html>
